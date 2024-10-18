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
            'nom' => $this->faker->name(),
            'description' => $this->faker->sentence(6, true),
            'categorie' => $this->faker->word(),
            'visuel' => $this->faker->text(),
            'temps_preparation' => $this->faker->numberBetween(1, 120),
            'nb_personnes' => $this->faker->numberBetween(1, 10),
            'cout' => $this->faker->numberBetween(1, 5),
        ];
    }
}
