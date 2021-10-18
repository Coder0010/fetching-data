<?php

namespace App\Models;

use App\Models\Entity;
use App\Models\Traits\QueryStringTrait;
use App\Models\Contracts\QueryStringInterface;

class ProductInvoice extends Entity implements QueryStringInterface
{
    use QueryStringTrait;
    
    protected $table = "product_invoice";

    private $invoice_id;
    private $product_id;
    
    public function push($invoice_id, $product_id)
    {
        $this->setInvoiceId($invoice_id);
        $this->setProductId($product_id);
        return $this;
    }

    public function findRowQueryString($invoice_id, $product_id)
    {
        return "SELECT * FROM {$this->getTable()} where invoice_id = '{$invoice_id}' AND product_id = '{$product_id}';";
    }

    public function insertQueryString()
    {
        return "INSERT INTO {$this->getTable()} VALUES (null, '{$this->getInvoiceId()}', '{$this->getProductId()}');";
    }
    
    /**
     * Get the value of invoice_id
     */ 
    public function getInvoiceId()
    {
        return $this->invoice_id;
    }

    /**
     * Set the value of invoice_id
     *
     * @return  self
     */ 
    public function setInvoiceId($invoice_id)
    {
        $this->invoice_id = $invoice_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */ 
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProductId($product_id)
    {
        $this->product_id = trim($product_id);

        return $this;
    }
}
