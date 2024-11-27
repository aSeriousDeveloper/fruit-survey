<?php

namespace App\Http\Controllers;

use App\Models\FormResponseFruit;
use Illuminate\Cache\CacheManager;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return Inertia::render('Welcome', [
            'summary' => FormResponseFruit::getCachedSummary(),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }
}
