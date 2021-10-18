<?php

namespace App\Repositories\Eloquents;

use App\Models\Product;
use App\Repositories\Eloquents\BaseEloquent;
use App\Repositories\Contracts\ProductRepository;

class ProductEloquent extends BaseEloquent implements ProductRepository
{
    public function entity()
    {
        return new Product();
    }

}
