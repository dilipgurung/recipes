<?php

namespace Gousto\Repositories;

use Gousto\Contracts\Repository;
use Gousto\Models\Rating;

Class RatingRepository implements Repository
{

    public function all()
    {
        return Rating::all();
    }

    public function find($id)
    {
        return Rating::findOrFail($id);
    }

    public function findBy(array $criteria, $limit = 10)
    {
        return Rating::where($criteria)->paginate($limit);
    }

    public function create(array $data)
    {
        return Rating::create($data);
    }

    public function update($id, array $data)
    {
        $rating = $this->find($id);
        return $rating->update($data);
    }
}