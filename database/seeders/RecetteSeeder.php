<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recette;
use App\Models\User;
use Illuminate\Database\Seeder;

class RecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This method seeds the 'recettes' table with 10 new records. Each 'recette' is associated
     * with random ingredients and a random user.
     */
    public function run(): void
    {
        $users_id = User::all()->pluck('id');

        $recettes = Recette::factory()->count(10)->make();

        foreach ($recettes as $recette) {
            $recette->save();

            $ingredients = Ingredient::inRandomOrder()->take(3)->pluck('id');

            foreach ($ingredients as $ingredient_id) {
                $recette->ingredients()->attach($ingredient_id, ['quantite' => rand(1, 10)]);
            }
        }

        $recettes->each(function ($recette) use ($users_id) {
            $recette->user_id = $users_id->random();
            $recette->save();
        });
    }
}
