<?php

namespace App\Observers;

use App\Models\Contracts\UsesCachedModels;
use App\Models\FormResponse;

class CachedModelsObserver
{
    public function created(UsesCachedModels $cachedModel): void
    {
        $cachedModel::forgetCachedSummary();
    }

    public function updated(UsesCachedModels $cachedModel): void
    {
        $cachedModel::forgetCachedSummary();
    }

    public function deleted(UsesCachedModels $cachedModel): void
    {
        $cachedModel::forgetCachedSummary();
    }
}
