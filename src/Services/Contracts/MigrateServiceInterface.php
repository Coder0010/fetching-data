<?php

namespace App\Services\Contracts;

interface MigrateServiceInterface
{
    /**
     * 
     * @return bool
     */
    public function migrate() : bool;
}
