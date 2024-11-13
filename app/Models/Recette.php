<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array
     */
    protected $fillable = [
        'nom',                // Le nom de la recette
        'description',        // La description de la recette
        'categorie',          // La catégorie de la recette
        'visuel',             // La représentation visuelle (image) de la recette
        'nb_personnes',       // Le nombre de personnes que la recette sert
        'temps_preparation',  // Le temps de préparation de la recette
        'cout',               // Le coût de la recette
    ];
}
