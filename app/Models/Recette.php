<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

<<<<<<< HEAD
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

=======
    /*
     * The attributes that are mass assignable.
     */
    protected $fillable = ['nom', 'description', 'categorie', 'visuel', 'temps_preparation', 'nb_personnes', 'cout', 'created_at', 'updated_at'];
}
>>>>>>> origin/bug-affichage-recette
