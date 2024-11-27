<?php

namespace App\Http\Controllers;

use App\Enums\Fruit;
use App\Models\FormResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Dashboard', [
            'fruit' => Fruit::cases(),
            'submissions' => FormResponse::with('formResponseFruit')->whereBelongsTo($request->user())->get(),
        ]);
    }
}
