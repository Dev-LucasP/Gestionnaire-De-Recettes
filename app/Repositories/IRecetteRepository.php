<?php

namespace App\Repositories;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Collection;

interface IRecetteRepository
{
    public function all();
    public function find($id): Recette;
    public function create(array $data): Recette;
    public function update(int $id, array $data): Recette;
    public function delete(int $id): void;
    public function categories();
}
