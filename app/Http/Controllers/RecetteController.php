<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class RecetteController extends Controller
{
    /**
     * Affiche la liste des recettes.
     *
     * @param  \Illuminate\Http\Request  $request  La requête HTTP.
     * @return \Illuminate\View\View  La vue affichant la liste des recettes.
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
     * @return \Illuminate\View\View  La vue affichant le formulaire de création de recette.
     */
    public function create()
    {
        return view('recettes.create');
    }

    /**
     * Enregistre une nouvelle recette dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request  La requête HTTP contenant les données de la recette.
     * @return \Illuminate\Http\RedirectResponse  La réponse HTTP redirigeant vers la liste des recettes.
     */
    public function store(Request $request)
    {
        try {
            // Valide les données entrées par l'utilisateur
            $validated = $request->validate([
                'nom' => 'required|string|max:255', // Nom de la recette
                'description' => 'required|string', // Description de la recette
                'categorie' => 'required|string', // Catégorie de la recette
                'nb_personnes' => 'required|integer|min:1', // Nombre de personnes
                'temps_preparation' => 'required|integer|min:1', // Temps de préparation en minutes
                'cout' => 'required|numeric|min:0', // Coût de la recette
                'visuel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // visuel de la recette
            ]);

            // Vérifier et traiter le fichier téléversé
            if ($request->hasFile('visuel') && $request->file('visuel')->isValid()) {
                $file = $request->file('visuel');
                $nom = sprintf("%s.jpg", $validated['nom']); // Nom de l’image basé sur le nom de la recette
                $path = $file->storeAs('images', $nom, 'public'); // Stockage dans public/images
                $validated['visuel'] = $path;
            }

            // Création de la recette
            Recette::create($validated);

            return redirect()->route('recettes.index')
                ->with('type', 'primary')
                ->with('msg', 'Recette créée avec succès !');
        }
        catch (\Exception) {
            return redirect()->route('recettes.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de la création de la recette.');
        }
    }

    /**
     * Affiche une recette spécifique.
     *
     * @param  \App\Models\Recette  $recette  L'instance de la recette à afficher.
     * @return \Illuminate\View\View  La vue affichant les détails de la recette.
     */
    public function show(Recette $recette)
    {
        return view('recettes.show', compact('recette'));
    }

    /**
     * Affiche le formulaire pour modifier une recette existante.
     *
     * @param  \App\Models\Recette  $recette  L'instance de la recette à modifier.
     * @return \Illuminate\View\View  La vue affichant le formulaire de modification de recette.
     */
    public function edit(Recette $recette)
    {
        return view('recettes.edit', compact('recette'));
    }

    /**
     * Met à jour une recette existante dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request  La requête HTTP contenant les données de la recette.
     * @param  \App\Models\Recette  $recette  L'instance de la recette à mettre à jour.
     * @return \Illuminate\Http\RedirectResponse  La réponse HTTP redirigeant vers la liste des recettes.
     */
    public function update(Request $request, Recette $recette)
    {
        try {
            // Valide les données entrées par l'utilisateur
            $validated = $request->validate([
                'nom' => 'required|string|max:255', // Nom de la recette
                'description' => 'required|string', // Description de la recette
                'categorie' => 'required|string', // Catégorie de la recette
                'nb_personnes' => 'required|integer|min:1', // Nombre de personnes
                'temps_preparation' => 'required|integer|min:1', // Temps de préparation en minutes
                'cout' => 'required|numeric|min:0', // Coût de la recette
                'visuel' => 'file|mimes:jpeg,png,jpg,gif|max:2048' // Visuel de la recette
            ]);

            // Si la validation passe, on effectue la mise à jour
            $recette->update($validated);

            // Gestion du visuel
            if ($request->hasFile('visuel') && $request->file('visuel')->isValid()) {
                $file = $request->file('visuel');
                $filename = sprintf("%s_%d.%s", $recette->nom, time(), $file->extension());

                // Supprime l'ancien visuel s'il existe
                if ($recette->visuel) {
                    Storage::delete($recette->visuel);
                }

                // Stocke le nouveau visuel
                $file->storeAs('images', $filename);
                $recette->visuel = 'images/' . $filename;
                $recette->save();
            }

            // Redirection en cas de succès de la validation et de l'update
            return redirect()->route('recettes.index')
                ->with('type', 'primary')
                ->with('msg', 'Recette modifiée avec succès !');
        } catch (\Exception) {
            // Redirection avec message d'avertissement en cas d'échec de validation
            return redirect()->route('recettes.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de l\'ajout de la recette.');
        }
    }

    /**
     * Supprime une recette de la base de données.
     *
     * @param  \App\Models\Recette  $recette  L'instance de la recette à supprimer.
     * @return \Illuminate\Http\RedirectResponse  La réponse HTTP redirigeant vers la liste des recettes.
     */
    public function destroy(Recette $recette)
    {
        $recette->delete();

        return redirect()->route('recettes.index')
            ->with('success', 'Recette supprimée avec succès.');
    }

}
