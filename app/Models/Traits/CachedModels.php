<?php

namespace App\Models\Traits;

use App\Models\Contracts\UsesCachedModels;
use App\Observers\CachedModelsObserver;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

trait CachedModels
{

    public static function bootCachedModels(): void
    {
        static::observe(CachedModelsObserver::class);
    }

    public static function forgetCachedSummary(): void
    {
        Cache::forget(static::getSummaryCacheKey());
    }

    /**
     * @return Collection<UsesCachedModels>
     */
    public static function getCachedSummary(): Collection
    {
        return Cache::rememberForever(self::getSummaryCacheKey(), function () {
            return static::getSummary();
        });
    }

    public static function getSummaryCacheKey(): string
    {
        return md5(parent::class . 'summary') ;
    }
}
