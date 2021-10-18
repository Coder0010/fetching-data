<?php 

namespace App\Models\Contracts;

interface QueryStringInterface{

    function selectAllQueryString();

    function selectByQueryString($column, $search);

    function insertQueryString();
}