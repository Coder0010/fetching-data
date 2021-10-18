<?php

namespace App\Repositories\Contracts;

use App\Repositories\Contracts\BaseRepository;

interface ProductInvoiceRepository extends BaseRepository
{
    public function fetchRow($invoice_id, $product_id);
}
