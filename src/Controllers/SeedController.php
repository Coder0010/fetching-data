<?php

namespace App\Controllers;

use App\Services\SeedService;
use App\Services\ImportService;
use App\Repositories\Eloquents\InvoiceEloquent;
use App\Repositories\Eloquents\ProductEloquent;
use App\Repositories\Eloquents\CustomerEloquent;
use App\Controllers\Contracts\ControllerInterface;
use App\Repositories\Eloquents\ProductInvoiceEloquent;

class SeedController implements ControllerInterface
{
    private $importService;
    
    public function __construct($incomingData) {
        $this->setImportService($incomingData);
    }
    
    public function handle()
    {
        $service = new SeedService(
            new CustomerEloquent(),
            new ProductEloquent(),
            new InvoiceEloquent(),
            new ProductInvoiceEloquent(),
        );
        $service->save($this->getImportService());
        echo "seeding done \n\n";
    }

    /**
     * Get the value of ImportService
     */ 
    public function getImportService()
    {
        return $this->ImportService;
    }

    /**
     * Set the value of ImportService
     *
     * @return  self
     */ 
    public function setImportService($importService)
    {
        $this->ImportService = $importService;

        return $this;
    }
}
