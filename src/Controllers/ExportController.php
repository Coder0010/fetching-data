<?php

namespace App\Controllers;

use App\Services\ExportService;
use App\Repositories\Eloquents\InvoiceEloquent;
use App\Repositories\Eloquents\ProductEloquent;
use App\Repositories\Eloquents\CustomerEloquent;
use App\Controllers\Contracts\ControllerInterface;
use App\Repositories\Eloquents\ProductInvoiceEloquent;

class ExportController implements ControllerInterface
{
    public function handle()
    {
        $service = new ExportService(
            new CustomerEloquent(),
            new ProductEloquent(),
            new InvoiceEloquent(),
            new ProductInvoiceEloquent(),
        );
        $service->export();
        echo "Data Exported at Json and Saved at file [ src/Files/data.json ]\n";
    }

}
