<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Seeder;
use App\Models\Recette;

class RecetteSeeder extends Seeder
{
    public function run()
    {
        Recette::factory()->count(10)->create(); // Crée 10 recettes aléatoires
    }
}

=======
use App\Models\Recette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Recette::factory()->count(10)->create();
    }
}
>>>>>>> origin/bug-affichage-recette
