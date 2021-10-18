<?php

namespace App\Database\Connections;

use App\Env;
use App\Database\Contracts\ConnectInterface;

class Mysql implements ConnectInterface
{
    public $host;
    
    public $db;

    public $dsn;
    
    public $user;
    
    public $password;
    
    public $options;
    
    public $connection;

    public function __construct() {
        $this->setHost(Env::HOST);
        $this->setDb(Env::DB);
        $this->setUser(Env::USER);
        $this->setPassword(Env::PASSWORD);
        $this->setOptions([
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function openConnection() : \PDO
    {
        try {
            $pdo = new \PDO($this->getDsn(), $this->getUser(), $this->getPassword(), $this->getOptions());
            if ($pdo) {
                $this->setConnection($pdo);
            }else{
                echo "failed to connect to [ {$this->getHost()} ]! \n\n";
            }
            return $pdo;
        } catch (\PDOExeception $e) {
        }
    }

    public function execute(string $sql) : int
    {
        try {
            $result = $this->getConnection()->exec($sql);
            $id = $this->getConnection()->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return -1;
        }
    }

    public function query(string $sql) : array
    {
        $results = [];
        try {
            $q = $this->getConnection()->prepare($sql);
            $q->execute();
            $results = $q->fetchAll(\PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return $results;
        }
    }

    /**
     * 
     * 
     * start of getters && setters
     * 
     * 
     */

    /**
     * Get the value of options
     */ 
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return  self
     */ 
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get the value of host
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the value of host
     *
     * @return  self
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    /**
     * Get the value of dsn
     */ 
    public function getDsn()
    {
        return "mysql:host=".$this->getHost().";charset=utf8;";
    }

    /**
     * Set the value of dsn
     *
     * @return  self
     */ 
    public function setDsn($dsn)
    {
        $this->dsn = $dsn;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of connection
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Set the value of connection
     *
     * @return  self
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;

        return $this;
    }
}
