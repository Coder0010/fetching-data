<?php

namespace App;

class Env
{
    // mysql Connection Constants
    const CONNECTION             = "mysql";
    const HOST                   = "localhost";
    const DB                     = "task_mts_fetching_data";
    const USER                   = "root";
    const PASSWORD               = "15935755";

    // EXCEL CELLS INDEX
    const INVOICE_ID_INDEX       = "0";
    const INVOICE_DATE_INDEX     = "1";
    const CUSTOMER_NAME_INDEX    = "2";
    const CUSTOMER_ADDRESS_INDEX = "3";
    const PRODUCT_NAME_INDEX     = "4";
    const PRODUCT_PRICE_INDEX    = "6";
    const QUANTITY_INDEX         = "5";
    const TOTAL_INDEX            = "7";
    const TOTAL_GRAND_INDEX      = "8";
}
