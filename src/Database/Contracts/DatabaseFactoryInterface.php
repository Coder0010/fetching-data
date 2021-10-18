<?php

namespace App\Database\Contracts;

use App\Database\Contracts\ConnectInterface;

interface DatabaseFactoryInterface
{
    /**
     * @return ConnectInterface
     */
    public function create() : ConnectInterface;
}
