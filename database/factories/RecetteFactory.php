<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecetteFactory extends Factory
{
    protected $model = \App\Models\Recette::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->word(), // Nom de la recette
            'description' => $this->faker->paragraph(), // Description
            'categorie' => $this->faker->randomElement(['entrée', 'plat', 'dessert']), // Catégorie
            'visuel' => $this->faker->imageUrl(640, 480, 'food', true, 'recipe'), // Visuel (URL d'image)
            'nb_personnes' => $this->faker->numberBetween(1, 8), // Nombre de personnes
            'temps_preparation' => $this->faker->numberBetween(5, 60), // Temps de préparation (en minutes)
            'cout' => $this->faker->numberBetween(1, 5), // Coût (de 1 à 5)
        ];
    }
}
