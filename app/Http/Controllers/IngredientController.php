<?php

namespace App\Http\Controllers;

use App\Repositories\IIngredientRepository;

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

    // Ajoute d'autres méthodes pour créer, mettre à jour, supprimer...
}
