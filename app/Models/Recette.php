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
        'visuel',              // Le visuel de la recette
        'user_id',            // L'identifiant de l'utilisateur qui a créé la recette
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'compose')
            ->withPivot('quantite', 'observation')
            ->as('compose')
            ->withTimestamps();
    }

}
