<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel()
    {
        return app($this->model);
    }


    public function all()
    {
        return $this->model->all();
    }
    
    public function find($id)
    {
        return $this->model->find($id);
    }
    
    public function create(array $data)
    {
        return $this->model->create($data);
    }
    
    public function update(array $data, $id)
    {
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }
    
    public function delete($id)
    {
        $model = $this->model->find($id);
        $model->delete();
        return ;
    }
}