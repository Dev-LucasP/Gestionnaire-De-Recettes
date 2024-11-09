<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'description',
        'categorie',
        'visuel',
        'nb_personnes',
        'temps_preparation',
        'cout',
    ];
}


