<?php

namespace App\Database\Contracts;

interface ExecutorInterface
{
    /**
     * Create, Alter, Drop, Rename, Truncate
     * Dealing With Columns of Tables
     * @return bool
     */
    public function runQuery(string $query);

    public function runExecute(string $query);

}
