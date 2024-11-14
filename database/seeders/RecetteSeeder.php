<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recette;

class RecetteSeeder extends Seeder
{
    /**
     * Exécute les commandes de la base de données pour semer les données.
     *
     * @return void
     */
    public function run()
    {
        // Crée 10 recettes aléatoires en utilisant la fabrique de modèles
        Recette::factory()->count(10)->create();
    }
}
