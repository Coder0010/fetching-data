<?php

namespace App\Services\Contracts;

interface ImportServiceInterface
{
    /**
     * @return array
     */
    public function import(string $filePath) : array;
}
