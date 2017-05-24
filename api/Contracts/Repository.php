<?php

namespace Gousto\Contracts;

interface Repository
{
    public function all();

    public function find($id);

    public function findBy(array $criteria, $limit = 10);

    public function create(array $data);

    public function update($id, array $data);
}