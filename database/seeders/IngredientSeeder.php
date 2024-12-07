<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method uses the Ingredient factory to create 20 instances of the Ingredient model
     * and inserts them into the database.
     */
    public function run(): void
    {
        Ingredient::factory(20)->create();
    }
}
