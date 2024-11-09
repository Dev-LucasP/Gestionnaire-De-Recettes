<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    public function index()
    {
        $recettes = Recette::all();  // Récupère toutes les recettes
        return view('recettes.index', [
            'titre' => 'Liste des Recettes',
            'recettes' => $recettes
        ]);
    }
=======
use Illuminate\Http\Request;
use App\Models\Recette;

class RecetteController extends Controller
{
    public function index() {
        $recettes = Recette::all(); // stocke dans la variable $Taches, les objets Tache récupérés dans la table taches de la base de données.
        return view('recettes.index', ['recettes' => $recettes]);
    }

>>>>>>> origin/bug-affichage-recette
}
