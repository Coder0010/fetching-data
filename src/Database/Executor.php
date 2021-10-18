<?php

namespace App\Database;

use App\Env;
use App\Database\DatabaseFactory;
use App\Database\Contracts\ExecutorInterface;

class Executor implements ExecutorInterface
{
    private $dbConnection;

    public function __construct()
    {
        $factory = new DatabaseFactory(Env::CONNECTION);
        $connection = $factory->create();
        $this->setDbConnection($connection);
        $this->getDbConnection()->openConnection();
    }

    public function runQuery(string $query)
    {
        try {
            $result = $this->getDbConnection()->query($query);
            return $result;
        } catch (\PDOExeception $e) {
        }
    }

    public function runExecute(string $query)
    {
        try {
            $result = $this->getDbConnection()->execute($query);
            return $result;
        } catch (\PDOExeception $e) {
        }
    }

    /**
     * Get the value of dbConnection
     */ 
    public function getDbConnection()
    {
        return $this->dbConnection;
    }

    /**
     * Set the value of dbConnection
     *
     * @return  self
     */ 
    public function setDbConnection($dbConnection)
    {
        $this->dbConnection = $dbConnection;

        return $this;
    }
}
