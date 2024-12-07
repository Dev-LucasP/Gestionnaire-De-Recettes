<?php

namespace App\Repositories;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class RecetteRepository
 *
 * This class implements the IRecetteRepository interface and provides methods
 * for interacting with the Recette model.
 *
 * @package App\Repositories
 */
class RecetteRepository implements IRecetteRepository
{
    /**
     * Retrieve all recettes, optionally filtered by category.
     *
     * @param string|null $category The category to filter recettes by.
     * @return Collection|Recette[] The collection of recettes.
     */
    public function all($category = null)
    {
        if ($category && $category !== 'All') {
            return Recette::where('categorie', $category)->get();
        }
        return Recette::all();
    }

    /**
     * Find a recette by its ID.
     *
     * @param int $id The ID of the recette.
     * @return Recette The recette instance.
     */
    public function find($id): Recette
    {
        return Recette::findOrFail($id);
    }

    /**
     * Create a new recette.
     *
     * @param array $data The data for creating the recette.
     * @return Recette The created recette instance.
     */
    public function create(array $data): Recette
    {
        return Recette::create($data);
    }

    /**
     * Update an existing recette.
     *
     * @param int $id The ID of the recette to update.
     * @param array $data The data for updating the recette.
     * @return Recette The updated recette instance.
     */
    public function update(int $id, array $data): Recette
    {
        $recette = $this->find($id);
        $recette->update($data);

        return $recette;
    }

    /**
     * Delete a recette by its ID.
     *
     * @param int $id The ID of the recette to delete.
     * @return void
     */
    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    /**
     * Retrieve all distinct categories associated with recettes.
     *
     * @return \Illuminate\Support\Collection The collection of distinct categories.
     */
    public function categories()
    {
        return Recette::distinct('categorie')->pluck('categorie');
    }
}
