<?php

namespace App\Models;

use App\Models\Entity;
use App\Models\Traits\QueryStringTrait;
use App\Models\Contracts\QueryStringInterface;

class Customer extends Entity implements QueryStringInterface
{
    use QueryStringTrait;

    protected $table = "customers";

    public $id;
    private $name;
    private $address;
    
    public function push($name, $address)
    {
        $this->setName(trim($name));
        $this->setAddress(trim($address));
        return $this;
    }

    public function insertQueryString()
    {
        return "INSERT INTO {$this->getTable()} VALUES (NULL, '{$this->getName()}', '{$this->getAddress()}');";
    }
    
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = trim($name);

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = trim($address);

        return $this;
    }
}
