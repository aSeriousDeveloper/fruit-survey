<?php

namespace App\Enums;

use App\Enums\Interfaces\Colorful;
use App\Enums\Traits\Pluralized;

enum Fruit: String implements Colorful
{

    use Pluralized;

    case APPLE = 'Apple';
    case BANANA = 'Banana';
    case GRAPE = 'Grape';
    case ORANGE = 'Orange';
    case STRAWBERRY = 'Strawberry';

    public function color(): string
    {
        return match ($this) {
            Fruit::APPLE, Fruit::STRAWBERRY => 'Red',
            Fruit::BANANA => 'Yellow',
            Fruit::GRAPE => 'Green',
            Fruit::ORANGE => 'Orange',
        };
    }
}
