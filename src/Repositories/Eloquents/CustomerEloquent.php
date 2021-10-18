<?php

namespace App\Repositories\Eloquents;

use App\Models\Customer;
use App\Repositories\Eloquents\BaseEloquent;
use App\Repositories\Contracts\CustomerRepository;

class CustomerEloquent extends BaseEloquent implements CustomerRepository
{
    public function entity()
    {
        return new Customer();
    }

}
