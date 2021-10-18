<?php

namespace App\Models\Traits;

trait QueryStringTrait
{
    public function selectAllQueryString()
    {
        return "SELECT * FROM {$this->getTable()};";
    }

    public function selectByQueryString($column, $search)
    {
        return "SELECT * FROM {$this->getTable()} where {$column} LIKE '%{$search}%';";
    }

}
