<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * This method calls the seeders for the 'users', 'ingredients', and 'recettes' tables
     * to populate the database with initial data.
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(RecetteSeeder::class);
    }
}
