<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('nom'); // Nom de la recette
            $table->text('description'); // Description de la recette
            $table->string('categorie'); // Catégorie (entrée, plat, dessert, ...)
            $table->string('visuel'); // Nom du fichier image
            $table->integer('nb_personnes'); // Nombre de personnes
            $table->integer('temps_preparation'); // Temps de préparation
            $table->integer('cout')->between(1, 5); // Fourchette de coût (1 à 5)
            $table->timestamps(); // Dates de création et de mise à jour
            $table->foreignIdFor(User::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Annule les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recettes');
    }
};
