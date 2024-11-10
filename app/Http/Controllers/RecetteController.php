<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    // Affiche la liste des recettes
    public function index(Request $request)
    {
        $cat = $request->input('cat', 'All');

        if ($cat != 'All') {
            $recettes = Recette::where('categorie', $cat)->get();
        } else {
            $recettes = Recette::all();
        }

        $categories = Recette::distinct('categorie')->pluck('categorie');

        return view('recettes.index', [
            'titre' => 'Liste des Recettes',
            'recettes' => $recettes,
            'cat' => $cat,
            'categories' => $categories
        ]);
    }


    // Affiche le formulaire pour créer une nouvelle recette
    public function create()
    {
        return view('recettes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string',
            'nb_personnes' => 'required|integer',
            'temps_preparation' => 'required|integer',
            'cout' => 'required|numeric',
        ]);

        // Attribuer le nom du visuel automatiquement
        $validatedData['visuel'] = strtolower($validatedData['nom']) . '.jpg';

        Recette::create($validatedData);

        return redirect()->route('recettes.index')->with('success', 'Recette ajoutée avec succès');
    }

    // Affiche une recette spécifique
    public function show(Recette $recette)
    {
        return view('recettes.show', compact('recette'));
    }

    // Affiche le formulaire pour modifier une recette existante
    public function edit(Recette $recette)
    {
        return view('recettes.edit', compact('recette'));
    }

    // Met à jour une recette

    public function update(Request $request, Recette $recette)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'categorie' => 'required|string',
            'nb_personnes' => 'required|integer',
            'temps_preparation' => 'required|integer',
            'cout' => 'required|numeric',
        ]);

        // Mettre à jour le nom du visuel automatiquement si le nom change
        $validatedData['visuel'] = strtolower($validatedData['nom']) . '.jpg';

        $recette->update($validatedData);

        return redirect()->route('recettes.index')->with('success', 'Recette modifiée avec succès');
    }

    // Supprime une recette
    public function destroy(Recette $recette)
    {
        $recette->delete();

        return redirect()->route('recettes.index')
            ->with('success', 'Recette supprimée avec succès.');
    }
}
