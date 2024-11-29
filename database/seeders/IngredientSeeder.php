<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingredient::create(['nom' => 'Farine', 'nature' => 'Sec', 'visuel' => 'farine.jpg']);
        Ingredient::create(['nom' => 'Sucre', 'nature' => 'Sec', 'visuel' => 'sucre.jpg']);
        Ingredient::create(['nom' => 'Pomme', 'nature' => 'Fruit', 'visuel' => 'pomme.jpg']);
    }
}
