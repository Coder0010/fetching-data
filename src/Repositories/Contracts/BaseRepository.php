<?php

namespace App\Repositories\Contracts;

interface BaseRepository
{
    public function fetchAll() : array;
    
    public function fetchBy($column, $name) : array;

    public function create($entity);
}
