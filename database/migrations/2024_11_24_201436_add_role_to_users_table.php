<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * This method adds a new 'role' column to the 'users' table. The 'role' column is an enum
     * with possible values 'admin', 'user', and 'visiteur', and it defaults to 'user'.
     */
    public function up(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'user', 'visiteur'])
                ->default('user')
                ->comment('Rôle de l\'utilisateur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method removes the 'role' column from the 'users' table.
     */
    public function down(): void {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }
};
