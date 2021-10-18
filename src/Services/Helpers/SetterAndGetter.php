<?php 

namespace App\Services\Helpers;

trait SetterAndGetter
{
    private $customerRepository;
    private $productRepository;
    private $invoiceRepository;
    private $productInvoiceRepository;

    /**
     * Get the value of customerRepository
     */ 
    public function getCustomerRepository()
    {
        return $this->customerRepository;
    }

    /**
     * Set the value of customerRepository
     *
     * @return  self
     */ 
    public function setCustomerRepository($customerRepository)
    {
        $this->customerRepository = $customerRepository;

        return $this;
    }

    /**
     * Get the value of productRepository
     */ 
    public function getProductRepository()
    {
        return $this->productRepository;
    }

    /**
     * Set the value of productRepository
     *
     * @return  self
     */ 
    public function setProductRepository($productRepository)
    {
        $this->productRepository = $productRepository;

        return $this;
    }

    /**
     * Get the value of invoiceRepository
     */ 
    public function getInvoiceRepository()
    {
        return $this->invoiceRepository;
    }

    /**
     * Set the value of invoiceRepository
     *
     * @return  self
     */ 
    public function setInvoiceRepository($invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;

        return $this;
    }

    /**
     * Get the value of productInvoiceRepository
     */ 
    public function getProductInvoiceRepository()
    {
        return $this->productInvoiceRepository;
    }

    /**
     * Set the value of productInvoiceRepository
     *
     * @return  self
     */ 
    public function setProductInvoiceRepository($productInvoiceRepository)
    {
        $this->productInvoiceRepository = $productInvoiceRepository;

        return $this;
    }
}
