<?php

namespace Database\Factories;

use DateTime;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetteFactory extends Factory
{
    // Le modèle associé à cette fabrique
    protected $model = \App\Models\Recette::class;

    /**
     * Définition de l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        $createAt = $this->faker->dateTimeInInterval('-6 months','+ 180 days' );
        $users_id = User::all()->pluck('id');
        return [
            'nom' => $this->faker->word(), // Nom de la recette
            'description' => $this->faker->paragraph(), // Description
            'categorie' => $this->faker->randomElement(['entrée', 'plat', 'dessert']), // Catégorie
            'visuel' => $this->faker->imageUrl(640, 480, 'food', true, 'recipe'), // Visuel (URL d'image)
            'nb_personnes' => $this->faker->numberBetween(1, 8), // Nombre de personnes
            'temps_preparation' => $this->faker->numberBetween(5, 60), // Temps de préparation (en minutes)
            'cout' => $this->faker->numberBetween(1, 5), // Coût (de 1 à 5)
            'user_id' => $this->faker->randomElement($users_id),
            'created_at' => $createAt,
            'updated_at' => $this->faker->dateTimeInInterval(
                $createAt, $createAt->diff(new DateTime('now'))->format("%R%a days"),
            ),
        ];
    }
}
