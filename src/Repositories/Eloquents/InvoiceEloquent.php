<?php

namespace App\Repositories\Eloquents;

use App\Models\Invoice;
use App\Repositories\Eloquents\BaseEloquent;
use App\Repositories\Contracts\InvoiceRepository;

class InvoiceEloquent extends BaseEloquent implements InvoiceRepository
{
    public function entity()
    {
        return new Invoice();
    }

}
