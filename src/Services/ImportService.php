<?php

namespace App\Services;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use App\Services\Contracts\ImportServiceInterface;

class ImportService implements ImportServiceInterface
{
    public function import(string $filePath) : array
    {
        // normal Array to store all rows of excel sheet
        $normalData = [];
        // new Array to store new rows of excel sheet
        $newData = [];
        // read Xlxs File
        $reader = ReaderEntityFactory::createReaderFromFile($filePath);
        // Open Connection
        $reader->open($filePath);
        // Initi Counter
        $counter = 0;
        // Looping On all sheets at xlxs File
        foreach ($reader->getSheetIterator() as $sheet) {
            // Looping On page one by one at xlxs File
            foreach ($sheet->getRowIterator() as $row) {
                $cells = $row->getCells();
                for ($i = 0; $i < count($cells); $i++) {
                    $normalData[$counter][$i] = $cells[$i]->getValue();
                }
                $counter++;
            }
        }
        $reader->close();
        $rowsWithoutHeader = array_splice($normalData, 1, count($normalData));
        return $rowsWithoutHeader;
    }
}
