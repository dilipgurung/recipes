<?php

namespace Gousto\Repositories;


use Gousto\Contracts\Repository;
use Gousto\Models\Recipe;

Class RecipeRepository implements Repository
{

    public function all()
    {
        return Recipe::all();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function findBy(array $criteria)
    {
        // TODO: Implement findBy() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function save()
    {
        // TODO: Implement save() method.
    }
}