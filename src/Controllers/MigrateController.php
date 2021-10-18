<?php

namespace App\Controllers;

use App\Services\MigrateService;
use App\Controllers\Contracts\ControllerInterface;

class MigrateController implements ControllerInterface
{
    
    /**
     * this method is handling the migration service 
     * @return [type]
     */
    public function handle()
    {
        $service = new MigrateService();
        $service->migrate();
        echo "database migrated \n\n";
    }
}
