<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * This method creates the 'recettes' table with the specified columns and constraints.
     */
    public function up()
    {
        Schema::create('recettes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->text('description');
            $table->string('categorie');
            $table->string('visuel');
            $table->integer('nb_personnes');
            $table->integer('temps_preparation');
            $table->integer('cout')->between(1, 5);
            $table->timestamps();
            $table->foreignIdFor(User::class)->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method drops the 'recettes' table.
     */
    public function down(): void
    {
        Schema::dropIfExists('recettes');
    }
};
