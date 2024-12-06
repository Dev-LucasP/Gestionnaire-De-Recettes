<?php

namespace App\Repositories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Collection;

class IngredientRepository implements IIngredientRepository
{
    public function all()
    {
        return Ingredient::all();
    }

    public function find($id): Ingredient
    {
        return Ingredient::findOrFail($id);
    }

    public function create(array $data): Ingredient
    {
        return Ingredient::create($data);
    }

    public function update(int $id, array $data): Ingredient
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($data);
        return $ingredient;
    }

    public function delete(int $id): void
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
    }
}
