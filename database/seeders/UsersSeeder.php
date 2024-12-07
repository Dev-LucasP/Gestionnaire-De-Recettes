<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * This method seeds the 'users' table with predefined and random user data.
     */
    public function run(): void {
        $faker = \Faker\Factory::create();

        User::factory([
            'name' => "Robert Duchmol",
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('GrosSecret'),
            'remember_token' => Str::random(10),
            'role' => Role::ADMIN,
        ])->create();

        User::factory([
            'name' => "Gérard Martin",
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Hash::make('GrosSecret'),
            'remember_token' => Str::random(10),
            'role' => Role::USER,
        ])->create();

        // Create 3 additional random users
        User::factory(3)->create();
    }
}
