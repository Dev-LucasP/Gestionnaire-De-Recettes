<?php

namespace App\Repositories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Collection;

interface IIngredientRepository
{
    public function all();
    public function find($id): Ingredient;
    public function create(array $data): Ingredient;
    public function update(int $id, array $data): Ingredient;
    public function delete(int $id): void;
}
