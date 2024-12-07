<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method creates the 'ingredients' table with the specified columns and constraints.
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('nature')->nullable();
            $table->string('visuel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method drops the 'ingredients' table.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
