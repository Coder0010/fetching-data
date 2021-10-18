<?php

namespace App\Services;

use App\Env;
use App\Database\Executor;
use App\Services\Contracts\MigrateServiceInterface;

class MigrateService implements MigrateServiceInterface
{
    // DROP DATABASE IF EXISTS ". Env::DB .";
    const CREATEDBMYSQL = "
        CREATE DATABASE IF NOT EXISTS ". Env::DB .";
        use ". Env::DB .";

        CREATE TABLE IF NOT EXISTS customers (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            address VARCHAR(30) NOT NULL
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;

        CREATE TABLE IF NOT EXISTS invoices (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            date VARCHAR(30) NOT NULL,
            customer_id INT(11) UNSIGNED NOT NULL,

            FOREIGN KEY (customer_id) REFERENCES customers(id) ON UPDATE CASCADE
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;

        CREATE TABLE IF NOT EXISTS products (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            price FLOAT NOT NULL
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;

        CREATE TABLE IF NOT EXISTS product_invoice (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            invoice_id INT(11) UNSIGNED NOT NULL,
            product_id INT(11) UNSIGNED NOT NULL,

            FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON UPDATE CASCADE,
            FOREIGN KEY (product_id) REFERENCES products(id) ON UPDATE CASCADE
        ) CHARACTER SET utf8 COLLATE utf8_general_ci;
    ";

    private $executer;
    
    public function __construct()
    {
        $executer = new Executor();
        $this->setExecuter($executer);
    }

    public function migrate() : bool
    {
        $query = self::CREATEDBMYSQL;
        $result = $this->getExecuter()->runExecute($query);
        return $result;
    }

    /**
     * Get the value of executer
     */ 
    public function getExecuter()
    {
        return $this->executer;
    }

    /**
     * Set the value of executer
     *
     * @return  self
     */ 
    public function setExecuter($executer)
    {
        $this->executer = $executer;

        return $this;
    }
}
