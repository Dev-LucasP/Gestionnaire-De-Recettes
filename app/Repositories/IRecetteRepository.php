<?php

namespace App\Repositories;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface IRecetteRepository
 *
 * This interface defines the methods for interacting with the Recette model.
 *
 * @package App\Repositories
 */
interface IRecetteRepository
{
    /**
     * Retrieve all recettes.
     *
     * @return Collection|Recette[] The collection of all recettes.
     */
    public function all();

    /**
     * Find a recette by its ID.
     *
     * @param int $id The ID of the recette.
     * @return Recette The recette instance.
     */
    public function find($id): Recette;

    /**
     * Create a new recette.
     *
     * @param array $data The data for creating the recette.
     * @return Recette The created recette instance.
     */
    public function create(array $data): Recette;

    /**
     * Update an existing recette.
     *
     * @param int $id The ID of the recette to update.
     * @param array $data The data for updating the recette.
     * @return Recette The updated recette instance.
     */
    public function update(int $id, array $data): Recette;

    /**
     * Delete a recette by its ID.
     *
     * @param int $id The ID of the recette to delete.
     * @return void
     */
    public function delete(int $id): void;

    /**
     * Retrieve all categories associated with recettes.
     *
     * @return mixed The collection of categories.
     */
    public function categories();
}
