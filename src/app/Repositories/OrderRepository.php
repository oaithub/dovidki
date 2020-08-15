<?php

namespace App\Repositories;

use App\Models\Order as Model;
use App\Models\OrderState;

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
    public function getAllWithPaginate($count = 25)    //TODO: with('state:code,name')
    {
        $columns = ['id', 'user_id', 'group', 'type', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->with(['user:id,name', 'state'])
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
        $columns = ['id', 'user_id', 'group', 'type', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->with('user', 'state')
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
        $columns = ['id', 'user_id', 'group', 'type', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('state_id', OrderState::STATE_WAIT_FOR_ISSUE)
            ->with('user:id,name', 'state')
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of ready orders for list with pagination
     *
     * @param int $count Orders per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getInQueuedWithPaginate($count = 25)
    {
        $columns = ['id', 'user_id', 'group', 'type', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('state_id', OrderState::STATE_IN_QUEUE)
            ->oldest('id')
            ->with('user:id,name', 'state')
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
        $columns = ['id', 'user_id', 'group', 'type', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->where('state_id', OrderState::STATE_ISSUED)
            ->with('user:id,name', 'state')
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
