<?php

namespace App\Models\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UsesCachedModels
{
    public static function bootCachedModels(): void;

    /**
     * @return Collection<UsesCachedModels>
     */
    public static function getSummary(): Collection;

    public static function forgetCachedSummary(): void;

    /**
     * @return Collection<UsesCachedModels>
     */
    public static function getCachedSummary(): Collection;

    public static function getSummaryCacheKey(): string;
}
