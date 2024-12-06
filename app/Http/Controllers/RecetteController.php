<?php

namespace App\Http\Controllers;

use App\Models\Recette;
use App\Repositories\IRecetteRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RecetteController extends Controller
{
    use AuthorizesRequests;
    private IRecetteRepository $recetteRepository;

    public function __construct(IRecetteRepository $recetteRepository)
    {
        $this->recetteRepository = $recetteRepository;
    }

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

    public function create()
    {
        return view('recettes.create', [
            'titre' => 'Liste des Recettes'
        ]);
    }

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

            $this->recetteRepository->create($validated);

            return redirect()->route('recettes.index')
                ->with('type', 'primary')
                ->with('msg', 'Recette créée avec succès !');
        } catch (\Exception $e) {
            return redirect()->route('recettes.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de la création de la recette.' . $e->getMessage());
        }
    }

    public function show(Recette $recette)
    {
        return view('recettes.show', compact('recette'));
    }

    public function edit(Recette $recette)
    {
        $this->authorize('update', $recette);
        return view('recettes.edit', compact('recette'), [
        'titre' => 'Liste des Recettes'
        ]);
    }

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
        } catch (\Exception) {
            return redirect()->route('recettes.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de l\'ajout de la recette.');
        }
    }

    public function destroy(Recette $recette)
    {
        $this->authorize('delete', $recette);

        $this->recetteRepository->delete($recette->id);

        return redirect()->route('recettes.index')
            ->with('success', 'Recette supprimée avec succès.');
    }
}
