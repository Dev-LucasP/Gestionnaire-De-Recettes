<?php

namespace App\Http\Controllers;

use App\Repositories\IIngredientRepository;
use Illuminate\Http\Request;

/**
 * Class IngredientController
 *
 * This controller handles the CRUD operations for ingredients.
 */
class IngredientController extends Controller
{
    /**
     * @var IIngredientRepository
     */
    private IIngredientRepository $ingredientRepository;

    /**
     * IngredientController constructor.
     *
     * @param IIngredientRepository $ingredientRepository The ingredient repository instance.
     */
    public function __construct(IIngredientRepository $ingredientRepository)
    {
        $this->ingredientRepository = $ingredientRepository;
    }

    /**
     * Display a listing of the ingredients.
     *
     * @return \Illuminate\View\View The view displaying the list of ingredients.
     */
    public function index()
    {
        $ingredients = $this->ingredientRepository->all();
        $titre = 'Liste des Ingrédients';
        return view('ingredients.index', compact('ingredients', 'titre'));
    }

    /**
     * Display the specified ingredient.
     *
     * @param int $id The ID of the ingredient to display.
     * @return \Illuminate\View\View The view displaying the ingredient details.
     */
    public function show($id)
    {
        $ingredient = $this->ingredientRepository->find($id);
        return view('ingredients.show', compact('ingredient'));
    }

    /**
     * Show the form for creating a new ingredient.
     *
     * @return \Illuminate\View\View The view displaying the form to create a new ingredient.
     */
    public function create()
    {
        $titre = 'Créer un nouvel Ingrédient';
        return view('ingredients.create', compact('titre'));
    }

    /**
     * Store a newly created ingredient in storage.
     *
     * @param Request $request The request instance containing the input data.
     * @return \Illuminate\Http\RedirectResponse The response after storing the ingredient.
     */
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
