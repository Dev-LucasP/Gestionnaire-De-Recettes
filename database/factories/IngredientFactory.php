<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    // The model associated with this factory
    protected $model = \App\Models\Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word(), // Name of the ingredient
            'nature' => $this->faker->randomElement(['Sec', 'Liquide', 'Frais']), // Category
            'visuel' => $this->faker->imageUrl(640, 480, 'food', true, 'ingredient'), // Visual (image URL)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
