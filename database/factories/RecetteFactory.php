<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recette>
 */
class RecetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->word(3,true),
            'description' => $this->faker->paragraph(),
            'categorie' => $this->faker->randomElement(['entree', 'plat', 'dessert']),
            'visuel' => $this->faker->imageUrl(640, 480, 'food'),
            'temps_preparation' => $this->faker->numberBetween(1, 120),
            'nb_personnes' => $this->faker->numberBetween(1, 10),
            'cout' => $this->faker->numberBetween(1, 100),
        ];
    }
}
