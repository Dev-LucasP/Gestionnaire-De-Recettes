<?php

namespace Database\Factories;

use DateTime;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class RecetteFactory
 *
 * This factory is responsible for generating fake data for the Recette model.
 *
 * @package Database\Factories
 */
class RecetteFactory extends Factory
{
    protected $model = \App\Models\Recette::class;

    /**
     * Define the model's default state.
     *
     * This method returns an array of default values for the Recette model's attributes.
     *
     * @return array The default values for the Recette model's attributes.
     */
    public function definition()
    {
        $createAt = $this->faker->dateTimeInInterval('-6 months', '+ 180 days');
        $users_id = User::all()->pluck('id');
        return [
            'nom' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'categorie' => $this->faker->randomElement(['entrée', 'plat', 'dessert']),
            'visuel' => $this->faker->imageUrl(640, 480, 'food', true, 'recipe'),
            'nb_personnes' => $this->faker->numberBetween(1, 8),
            'temps_preparation' => $this->faker->numberBetween(5, 60),
            'cout' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->randomElement($users_id),
            'created_at' => $createAt,
            'updated_at' => $this->faker->dateTimeInInterval(
                $createAt, $createAt->diff(new DateTime('now'))->format("%R%a days")
            ),
        ];
    }
}
