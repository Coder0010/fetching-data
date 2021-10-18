<?php

namespace App\Models;

use App\Models\Entity;
use App\Models\Traits\QueryStringTrait;
use App\Models\Contracts\QueryStringInterface;

class Product extends Entity implements QueryStringInterface
{
    use QueryStringTrait;
    
    protected $table = "products";

    public $id;
    private $name;
    private $price;
    
    public function push($name, $price)
    {
        $this->setName($name);
        $this->setPrice($price);
        return $this;
    }

    public function insertQueryString()
    {
        return "INSERT INTO {$this->getTable()} VALUES (NULL, '{$this->getName()}', '{$this->getPrice()}');";
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
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = trim($price);

        return $this;
    }
}
