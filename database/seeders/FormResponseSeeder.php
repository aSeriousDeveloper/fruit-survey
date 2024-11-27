<?php

namespace Database\Seeders;

use App\Models\FormResponse;
use App\Models\FormResponseFruit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormResponse::factory()
            ->count(10)
            ->has(FormResponseFruit::factory())
            ->create();
    }
}
