<?php

namespace App\Repositories;

use App\Models\OrderType as Model;
use Illuminate\Support\Collection;

/**
 * Class OrderRepository.
 */
class OrderTypeRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Return collection of orders types for list
     *
     * @return Collection
     */
    public function getAllForList()
    {
        $columns = ['id', 'name'];

        $result = $this->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Return array of order types id
     *
     * @return Collection
     */
    public function getAllId()
    {
        $result = $this->startConditions()
            ->pluck('id')
            ->toBase();

        return $result;
    }
}
