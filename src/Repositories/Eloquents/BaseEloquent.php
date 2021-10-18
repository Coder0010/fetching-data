<?php

namespace App\Repositories\Eloquents;

use App\Env;
use App\Models\Entity;
use App\Database\Executor;
use App\Database\Contracts\ExecutorInterface;
use App\Repositories\Contracts\BaseRepository;

abstract class BaseEloquent implements BaseRepository
{
    private $executer;
    
    public function __construct()
    {
        $executor = new Executor();
        $this->setExecuter($executor);
        $this->getExecuter()->runQuery("use ".Env::DB.";");
    }
    
    public abstract function entity();

    public function fetchAll() : array
    {
        $data = $this->getExecuter()->runQuery($this->entity()->selectAllQueryString());
        return $data;
    }
    
    public function fetchBy($column, $search) : array
    {
        if(in_array($column, ["id", "name"]))
        $data = $this->getExecuter()->runQuery($this->entity()->selectByQueryString($column, $search));
        return $data;
    }

    public function create($entity)
    {
        $data = $this->getExecuter()->runExecute($entity->insertQueryString());
        return $data;
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
