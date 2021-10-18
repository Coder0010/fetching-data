<?php

namespace App\Controllers;

use App\Services\ImportService;
use App\Controllers\Contracts\ControllerInterface;

class ImportController implements ControllerInterface
{
    public function handle()
    {
        $service = new ImportService();
        $status = $service->import(__DIR__."/../Files/data.xlsx");
        echo "Importing done \n\n";
        return $status;
    }

}
