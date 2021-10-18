<?php

namespace App\Services\Contracts;

interface SeedServiceInterface
{
    /**
     * @return bool
     */
    public function save(array $data);
}
