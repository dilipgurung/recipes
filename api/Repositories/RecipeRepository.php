<?php

namespace Gousto\Repositories;

use Gousto\Contracts\Repository;
use Gousto\Models\Recipe;

class RecipeRepository implements Repository
{

    public function all()
    {
        return Recipe::all();
    }

    public function find($id)
    {
        return Recipe::findOrFail($id);
    }

    public function findBy(array $criteria, $limit = 10)
    {
        return Recipe::where($criteria)->paginate($limit);
    }

    public function create(array $data)
    {
        return Recipe::create($data);
    }

    public function update($id, array $data)
    {
        $recipe = $this->find($id);
        return $recipe->update($data);
    }
}
