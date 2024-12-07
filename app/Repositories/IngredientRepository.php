<?php

namespace App\Repositories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class IngredientRepository
 *
 * This class implements the IIngredientRepository interface and provides methods
 * for interacting with the Ingredient model.
 *
 * @package App\Repositories
 */
class IngredientRepository implements IIngredientRepository
{
    /**
     * Retrieve all ingredients.
     *
     * @return Collection|Ingredient[] The collection of all ingredients.
     */
    public function all()
    {
        return Ingredient::all();
    }

    /**
     * Find an ingredient by its ID.
     *
     * @param int $id The ID of the ingredient.
     * @return Ingredient The ingredient instance.
     */
    public function find($id): Ingredient
    {
        return Ingredient::findOrFail($id);
    }

    /**
     * Create a new ingredient.
     *
     * @param array $data The data for creating the ingredient.
     * @return Ingredient The created ingredient instance.
     */
    public function create(array $data): Ingredient
    {
        return Ingredient::create($data);
    }

    /**
     * Update an existing ingredient.
     *
     * @param int $id The ID of the ingredient to update.
     * @param array $data The data for updating the ingredient.
     * @return Ingredient The updated ingredient instance.
     */
    public function update(int $id, array $data): Ingredient
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($data);
        return $ingredient;
    }

    /**
     * Delete an ingredient by its ID.
     *
     * @param int $id The ID of the ingredient to delete.
     * @return void
     */
    public function delete(int $id): void
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
    }
}
