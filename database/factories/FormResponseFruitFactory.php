<?php

namespace Database\Factories;

use App\Enums\Fruit;
use App\Models\FormResponse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormResponseFruit>
 */
class FormResponseFruitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'form_response_id' => FormResponse::factory(),
            'fruit' => $this->faker->randomElement(Fruit::class),
        ];
    }
}
