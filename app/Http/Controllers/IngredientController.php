<?php

namespace App\Http\Controllers;

use App\Repositories\IIngredientRepository;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    private IIngredientRepository $ingredientRepository;

    public function __construct(IIngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    public function index()
    {
        $ingredients = $this->ingredientRepository->all();
        $titre = 'Liste des Ingrédients';
        return view('ingredients.index', compact('ingredients', 'titre'));
    }

    public function show($id)
    {
        $ingredient = $this->ingredientRepository->find($id);
        return view('ingredients.show', compact('ingredient'));
    }

    public function create()
    {
        $titre = 'Créer un nouvel Ingrédient';
        return view('ingredients.create', compact('titre'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        try {
            $this->ingredientRepository->create($validated);

            return redirect()->route('ingredients.index')
                ->with('type', 'primary')
                ->with('msg', 'Ingrédient créé avec succès !');
        } catch (\Exception $e) {
            return redirect()->route('ingredients.index')
                ->with('type', 'danger')
                ->with('msg', 'Erreur lors de la création de l\'ingrédient: ' . $e->getMessage());
        }
    }
}
