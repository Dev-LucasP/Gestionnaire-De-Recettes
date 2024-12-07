<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recette
 *
 * This model represents a recipe in the application.
 *
 * @package App\Models
 */
class Recette extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'nom',
        'description',
        'categorie',
        'visuel',
        'nb_personnes',
        'temps_preparation',
        'cout',
        'user_id',
    ];

    /**
     * Get the user that owns the recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ingredients that belong to the recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'compose')
            ->withPivot('quantite', 'observation')
            ->as('compose')
            ->withTimestamps();
    }
}
