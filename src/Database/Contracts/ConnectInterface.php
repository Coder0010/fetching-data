<?php

namespace App\Database\Contracts;

interface ConnectInterface
{
    /**
     * @return bool
     */
    public function openConnection() : \PDO;

    /**
     * @param string $sql
     * 
     * @return int
     */
    public function execute(string $sql) : int;

    /**
     * @param string $sql
     * 
     * @return int
     */
    public function query(string $sql) : array;

}
