<?php

use App\Controllers\SeedController;
use App\Controllers\ExportController;
use App\Controllers\ImportController;
use App\Controllers\MigrateController;

require_once realpath("vendor/autoload.php");

(new MigrateController)->handle();
$importedData = (new ImportController)->handle();
(new SeedController($importedData))->handle();
(new ExportController())->handle();