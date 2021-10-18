<?php

namespace App\Repositories\Eloquents;

use App\Models\ProductInvoice;
use App\Repositories\Eloquents\BaseEloquent;
use App\Repositories\Contracts\ProductInvoiceRepository;

class ProductInvoiceEloquent extends BaseEloquent implements ProductInvoiceRepository
{
    public function entity()
    {
        return new ProductInvoice();
    }

    public function fetchRow($invoice_id, $product_id) : array
    {
        $data = $this->getExecuter()->runQuery($this->entity()->findRowQueryString($invoice_id, $product_id));
        return $data;
    }
}
