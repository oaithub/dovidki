<?php

namespace App\Repositories;

use App\Order as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrderRepository.
 */
class OrderRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Return collection of orders for list with pagination
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'ready', 'issued_at', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->with(['user:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of ready orders for list with pagination
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getReadyWithPaginate($count)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'ready', 'issued_at', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('ready', 1)
            ->where('issued_at', null)
            ->with(['user:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of ready orders for list with pagination
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getIssuedWithPaginate($count)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'ready', 'issued_at', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('issued_at','!=' , null)
            ->with(['user:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     *
     *  @param int $id
     *  @return Model
     */
    public function getForEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Return one order for admin
     *
     * @param int $id
     * @return Model
     */
    public function getForShow($id) {
        return $this->startConditions()->find($id);
    }
}
