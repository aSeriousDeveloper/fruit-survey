<?php

namespace App\Models;

use App\Models\Contracts\UsesCachedModels;
use App\Models\Traits\CachedModels;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FormResponse extends Model implements UsesCachedModels
{
    /** @use HasFactory<\Database\Factories\FormResponseFactory> */
    use HasFactory;
    use CachedModels;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formResponseFruit(): HasMany
    {
        return $this->hasMany(FormResponseFruit::class);
    }

    public static function getSummary(): Collection
    {
        return FormResponse::query()->get();
    }
}
