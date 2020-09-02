<?php

namespace App\Repositories;

use App\Models\Order as Model;

/**
 * Class OrderRepository.
 */
class OrderRepository extends CoreRepository
{
    /**
     * @var string
     */
    protected $type;

    /**
     * Set the $type attribute
     *
     * @param $type
     */
    public function setType($type) {
        $this->type = $type;
    }

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
        $columns = ['id', 'user_id', 'group', 'type_id', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->oldest('id')
            ->with(['user:id,name', 'state:id,code', 'type:id,code,name'])
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
        $columns = ['id', 'user_id', 'group', 'type_id', 'state_id', 'response_message', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->with('user:id,name', 'state:id,code', 'type:id,code,name')
            ->where('user_id', $userId)
            ->oldest('id')
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

    protected function startConditions()
    {
        if(is_null($this->type)) {
            return parent::startConditions();
        }

        return parent::startConditions()->where('type_id', $this->type);
    }
}
