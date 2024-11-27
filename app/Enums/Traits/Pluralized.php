<?php

namespace App\Enums\Traits;

use Countable;
use Illuminate\Support\Str;

trait Pluralized
{
    public function plural(array|Countable|int $count = 2): string
    {
        return Str::plural($this->value, $count);
    }
}
