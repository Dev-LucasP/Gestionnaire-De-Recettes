<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class IngredientFactory
 *
 * This factory is responsible for generating fake data for the Ingredient model.
 *
 * @package Database\Factories
 */
class IngredientFactory extends Factory
{
    protected $model = \App\Models\Ingredient::class;

    /**
     * Define the model's default state.
     *
     * This method returns an array of default values for the Ingredient model's attributes.
     *
     * @return array The default values for the Ingredient model's attributes.
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'nature' => $this->faker->randomElement(['Sec', 'Liquide', 'Frais']),
            'visuel' => $this->faker->imageUrl(640, 480, 'food', true, 'ingredient'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
