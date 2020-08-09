<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /** CoreRepository constructor */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     *  @return Model
     */
    abstract protected function getModelClass();

    /**
     *  @return Model
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
