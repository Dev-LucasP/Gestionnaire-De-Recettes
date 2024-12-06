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
     */
    public function run(): void
    {
        $users_id = User::all()->pluck('id');
        $recettes = Recette::factory()->count(10)->make();
        foreach ($recettes as $recette) {
            // Save the recette first to get an ID
            $recette->save();

            // Sélectionner des ingrédients aléatoires pour la recette
            $ingredients = Ingredient::inRandomOrder()->take(3)->pluck('id');

            // Attacher les ingrédients à la recette avec une quantité (relation many-to-many)
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
