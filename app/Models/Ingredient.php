<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ingredient
 *
 * This model represents an ingredient in the application.
 *
 * @package App\Models
 */
class Ingredient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['nom', 'nature', 'visuel'];

    /**
     * Get the recipes that include this ingredient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recettes()
    {
        return $this->belongsToMany(Recette::class, 'compose')
            ->withPivot('quantite', 'observation')
            ->as('compositions')
            ->withTimestamps();
    }
}
