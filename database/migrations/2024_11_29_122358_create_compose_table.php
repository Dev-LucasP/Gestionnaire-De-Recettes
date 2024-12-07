<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method creates the 'compose' table with the specified columns and constraints.
     */
    public function up(): void
    {
        Schema::create('compose', function (Blueprint $table) {
            $table->unsignedBigInteger('recette_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->float('quantite');
            $table->string('observation')->nullable();

            $table->foreign('recette_id')->references('id')->on('recettes')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method drops the 'compose' table.
     */
    public function down(): void
    {
        Schema::dropIfExists('compose');
    }
};
