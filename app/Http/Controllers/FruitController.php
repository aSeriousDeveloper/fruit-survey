<?php

namespace App\Http\Controllers;

use App\Enums\Fruit;
use App\Models\FormResponse;
use App\Models\FormResponseFruit;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class FruitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, DatabaseManager $db)
    {
        $validated = $request->validate([
            'fruit' => ['required', 'between:1,2'],
            'fruit.*' => [Rule::enum(Fruit::class)],
            'last_eaten' => ['required', 'date'],
        ]);

        $db->transaction(function () use ($request, $validated) {
            $formResponse = new FormResponse();
            $formResponse->user()->associate($request->user());
            $formResponse->last_eaten = $validated['last_eaten'];

            $formResponse->save();

            foreach ($validated['fruit'] as $fruit) {
                $fruitModel = new FormResponseFruit();
                $fruitModel->fruit = $fruit;

                $formResponse->formResponseFruit()->save($fruitModel);
            }
        });
    }
}
