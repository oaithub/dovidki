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
     * @param int $count Orders per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count = 25)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'state', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->with(['user:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of orders for list with pagination
     *
     * @param int $userId User ID
     * @param int $count Orders per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllByUserIdWithPaginate($userId, $count = 25)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'state', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->where('user_id', $userId)
            ->oldest('id')
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of ready orders for list with pagination
     *
     * @param int $count Orders per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getReadyWithPaginate($count = 25)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'state', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('state', 'wait-for-issue')
            ->with(['user:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of ready orders for list with pagination
     *
     * @param int $count Orders per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getIssuedWithPaginate($count = 25)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'state', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('state', 'issued')
            ->with(['user:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     * Return one order for edit
     *
     *  @param int $id Target order id
     *  @return Model
     */
    public function getForEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Return one order for show
     *
     * @param int $id Target order id
     * @return Model
     */
    public function getForShow($id) {
        return $this->startConditions()->find($id);
    }
}
