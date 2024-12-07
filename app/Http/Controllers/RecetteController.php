<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Recette;
use App\Repositories\IRecetteRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

/**
 * Class RecetteController
 *
 * This controller handles the CRUD operations for recipes.
 */
class RecetteController extends Controller
{
    use AuthorizesRequests;

    /**
     * @var IRecetteRepository
     */
    private IRecetteRepository $recetteRepository;

    /**
     * RecetteController constructor.
     *
     * @param IRecetteRepository $recetteRepository The recipe repository instance.
     */
    public function __construct(IRecetteRepository $recetteRepository)
    {
        $this->recetteRepository = $recetteRepository;
    }

    /**
     * Display a listing of the recipes.
     *
     * @param Request $request The request instance containing the input data.
     * @return \Illuminate\View\View The view displaying the list of recipes.
     */
    public function index(Request $request)
    {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);

        if (!isset($cat)) {
            if (!isset($value)) {
                $recettes = $this->recetteRepository->all();
                $cat = 'All';
                Cookie::queue(Cookie::forget('cat'));
            } else {
                $recettes = $this->recetteRepository->all($value);
                $cat = $value;
                Cookie::queue('cat', $cat, 10);
            }
        } else {
            if ($cat == 'All') {
                $recettes = $this->recetteRepository->all();
                Cookie::queue(Cookie::forget('cat'));
            } else {
                $recettes = $this->recetteRepository->all($cat);
                Cookie::queue('cat', $cat, 10);
            }
        }

        $categories = $this->recetteRepository->categories();

        return view('recettes.index', [
            'titre' => 'Liste des Recettes',
            'recettes' => $recettes,
            'cat' => $cat,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new recipe.
     *
     * @return \Illuminate\View\View The view displaying the form to create a new recipe.
     */
    public function create()
    {
        $ingredients = Ingredient::all();
        return view('recettes.create', compact('ingredients'), [
            'titre' => 'Liste des Recettes'
        ]);
    }

    /**
     * Store a newly created recipe in storage.
     *
     * @param Request $request The request instance containing the input data.
     * @return \Illuminate\Http\RedirectResponse The response after storing the recipe.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'required|string',
                'categorie' => 'required|string',
                'nb_personnes' => 'required|integer|min:1',
                'temps_preparation' => 'required|integer|min:1',
                'cout' => 'required|numeric|min:0',
                'visuel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('visuel') && $request->file('visuel')->isValid()) {
                $file = $request->file('visuel');
                $nom = sprintf("%s.jpg", $validated['nom']);
                $path = $file->storeAs('images', $nom, 'public');
                $validated['visuel'] = $path;
            }

            $validated['user_id'] = Auth::id();

            $recette = $this->recetteRepository->create($validated);

            $recette->ingredients()->detach();

            $ingredients = $request->input('ingredients', []);
            foreach ($ingredients as $ingredient_id) {
                $recette->ingredients()->attach($ingredient_id, ['quantite' => rand(1, 10)]);
            }

            return redirect()->route('recettes.index')
                ->with('type', 'primary')
                ->with('msg', 'Recette créée avec succès !');
        } catch (\Exception $e) {
            return redirect()->route('recettes.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de la création de la recette.' . $e->getMessage());
        }
    }

    /**
     * Display the specified recipe.
     *
     * @param Recette $recette The recipe to display.
     * @return \Illuminate\View\View The view displaying the recipe details.
     */
    public function show(Recette $recette)
    {
        return view('recettes.show', compact('recette'));
    }

    /**
     * Show the form for editing the specified recipe.
     *
     * @param Recette $recette The recipe to edit.
     * @return \Illuminate\View\View The view displaying the form to edit the recipe.
     */
    public function edit(Recette $recette)
    {
        $this->authorize('update', $recette);

        $ingredients = Ingredient::all();

        return view('recettes.edit', compact('recette', 'ingredients'), [
            'titre' => 'Liste des Recettes'
        ]);
    }

    /**
     * Update the specified recipe in storage.
     *
     * @param Request $request The request instance containing the input data.
     * @param Recette $recette The recipe to update.
     * @return \Illuminate\Http\RedirectResponse The response after updating the recipe.
     */
    public function update(Request $request, Recette $recette)
    {
        $this->authorize('update', $recette);

        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'required|string',
                'categorie' => 'required|string',
                'nb_personnes' => 'required|integer|min:1',
                'temps_preparation' => 'required|integer|min:1',
                'cout' => 'required|numeric|min:0',
                'visuel' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $this->recetteRepository->update($recette->id, $validated);

            $recette->ingredients()->detach();

            $ingredients = $request->input('ingredients', []);

            foreach ($ingredients as $ingredient_id) {
                $recette->ingredients()->attach($ingredient_id, ['quantite' => rand(1, 10)]);
            }

            if ($request->hasFile('visuel') && $request->file('visuel')->isValid()) {
                $file = $request->file('visuel');
                $filename = sprintf("%s_%d.%s", $recette->nom, time(), $file->extension());

                if ($recette->visuel) {
                    Storage::delete($recette->visuel);
                }

                $file->storeAs('images', $filename);
                $recette->visuel = 'images/' . $filename;
                $recette->save();
            }

            return redirect()->route('recettes.index')
                ->with('type', 'primary')
                ->with('msg', 'Recette modifiée avec succès !');
        } catch (\Exception $e) {
            return redirect()->route('recettes.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de l\'ajout de la recette: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified recipe from storage.
     *
     * @param Recette $recette The recipe to delete.
     * @return \Illuminate\Http\RedirectResponse The response after deleting the recipe.
     */
    public function destroy(Recette $recette)
    {
        $this->authorize('delete', $recette);

        $this->recetteRepository->delete($recette->id);

        return redirect()->route('recettes.index')
            ->with('success', 'Recette supprimée avec succès.');
    }
}
