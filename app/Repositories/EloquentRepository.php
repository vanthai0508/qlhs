<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Request;


abstract class EloquentRepository implements EloquentInterface
{
    protected $model;


    public function __construct()
    {
        $this->setModel();
        
    }

    public function setModel()
    {
        $this->model=app()->make($this->getModel());
    }

    abstract public function getModel();

    public function list()
    {
        return $this->model->all();
    }
    public function create($request)
    {
        return $this->model->create( $request->all());
    }
    public function update(array $data, $id)
    {
        $result = $this->find($id);
        if($result)
        {
            $result->update($data);
            return $result;
        }
        return false;
    }
    public function delete($id)
    {
        
    }
    public function find($id)
    {
        $result=$this->model->findOrFail($id);
        return $result;
    }
}
?>