<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RecetteController extends Controller
{
    /**
     * Affiche la liste des recettes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Récupérer le critère de catégorie de la requête ou du cookie
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            // Si aucun critère n'est passé, utiliser la valeur du cookie
            if (!isset($value)) {
                $recettes = Recette::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $recettes = Recette::where('categorie', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);  // Conserver le critère dans le cookie pendant 10 minutes
            }
        } else {
            // Si un critère est passé, l'utiliser et mettre à jour le cookie
            if ($cat == 'All') {
                $recettes = Recette::all();
                Cookie::expire('cat');  // Supprimer le cookie si la catégorie est "All"
            } else {
                $recettes = Recette::where('categorie', $cat)->get();
                Cookie::queue('cat', $cat, 10);  // Conserver le critère dans le cookie pendant 10 minutes
            }
        }

        // Récupérer la liste des catégories disponibles pour le filtrage
        $categories = Recette::distinct('categorie')->pluck('categorie');

        // Retourner la vue avec les données nécessaires
        return view('recettes.index', [
            'titre' => 'Liste des Recettes',
            'recettes' => $recettes,
            'cat' => $cat,
            'categories' => $categories
        ]);
    }

    /**
     * Affiche le formulaire pour créer une nouvelle recette.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Enregistre une nouvelle recette dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Affiche une recette spécifique.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\View\View
     */
    public function show(Recette $recette)
    {
        return view('recettes.show', compact('recette'));
    }

    /**
     * Affiche le formulaire pour modifier une recette existante.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\View\View
     */
    public function edit(Recette $recette)
    {
        return view('recettes.edit', compact('recette'));
    }

    /**
     * Met à jour une recette existante dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Supprime une recette de la base de données.
     *
     * @param  \App\Models\Recette  $recette
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();

        return redirect()->route('recettes.index')
            ->with('success', 'Recette supprimée avec succès.');
    }
}
