<?php

namespace App\Database;

use App\Database\Connections\Mysql;
use App\Database\Contracts\ConnectInterface;
use App\Database\Contracts\DatabaseFactoryInterface;

class DatabaseFactory implements DatabaseFactoryInterface
{
    private $databaseType;
    
    /**
     * @param string $type
     */
    public function __construct(string $type) {
        $this->setDataBaseType($type);
    }

    /**
     * @return ConnectInterface
     */
    public function create() : ConnectInterface
    {
        switch ($this->getDataBaseType()) {
            case ("mysql"):
                return (new Mysql());
                break;
            // case ("sqllite"):
            //     return (new Mysql());
            //     break;
        }
    }

    /**
     * Get the value of databaseType
     */ 
    public function getDatabaseType()
    {
        return $this->databaseType;
    }

    /**
     * Set the value of databaseType
     *
     * @return  self
     */ 
    public function setDatabaseType($databaseType)
    {
        $this->databaseType = $databaseType;

        return $this;
    }
}
