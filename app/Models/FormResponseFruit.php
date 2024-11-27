<?php

namespace App\Models;

use App\Models\Contracts\UsesCachedModels;
use App\Models\Traits\CachedModels;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormResponseFruit extends Model implements UsesCachedModels
{
    /** @use HasFactory<\Database\Factories\FormResponseFruitFactory> */
    use HasFactory;
    use CachedModels;

    public function formResponse(): BelongsTo
    {
        return $this->belongsTo(FormResponse::class);
    }

    public static function getSummary(): Collection
    {
        return FormResponseFruit::query()
            ->selectRaw('count(fruit) AS fruit_count')
            ->addSelect('fruit')
            ->groupBy('fruit')
            ->orderByDesc('fruit_count')
            ->get();
    }
}
