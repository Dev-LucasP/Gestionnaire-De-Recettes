<?php

namespace App\Repositories;

use App\Models\Recette;
use Illuminate\Database\Eloquent\Collection;

class RecetteRepository implements IRecetteRepository
{
    public function all($category = null)
    {
        if ($category && $category !== 'All') {
            return Recette::where('categorie', $category)->get();
        }
        return Recette::all();
    }

    public function find($id): Recette
    {
        return Recette::findOrFail($id);
    }

    public function create(array $data): Recette
    {
        return Recette::create($data);
    }

    public function update(int $id, array $data): Recette
    {
        $recette = $this->find($id);
        $recette->update($data);

        return $recette;
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    public function categories()
    {
        return Recette::distinct('categorie')->pluck('categorie');
    }
}
