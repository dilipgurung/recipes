<?php

namespace Gousto\Contracts;

interface Repository
{
    public function all();

    public function find($id);

    public function findBy(array $criteria);

    public function create(array $data);

    public function update(array $data);

    public function save();
}