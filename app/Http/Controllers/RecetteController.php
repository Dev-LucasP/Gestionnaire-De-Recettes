<?php

namespace App\Http\Controllers;


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

}
