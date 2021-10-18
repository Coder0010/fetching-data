<?php

namespace App\Models;

use App\Models\Entity;
use App\Models\Traits\QueryStringTrait;
use App\Models\Contracts\QueryStringInterface;

class Invoice extends Entity implements QueryStringInterface
{
    use QueryStringTrait;
    
    protected $table = "invoices";

    public $id;
    private $date;
    private $customer_id;
    
    public function push(
        // $id, 
        $date, $customer_id)
    {
        // $this->setId($id);
        $this->setDate($date);
        $this->setCustomerId($customer_id);
        return $this;
    }

    public function insertQueryString()
    {
        return "INSERT INTO {$this->getTable()} VALUES (NULL, '{$this->getDate()}', '{$this->getCustomerId()}');";
    }
    
    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = trim($date);

        return $this;
    }

    /**
     * Get the value of customer_id
     */ 
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */ 
    public function setCustomerId($customer_id)
    {
        $this->customer_id = trim($customer_id);

        return $this;
    }
}
