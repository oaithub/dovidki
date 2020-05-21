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
    public function getAllWithPaginate()
    {
        $columns = ['id', 'user_id', 'group', 'type', 'ready', 'issued_at', 'user_id',];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->with(['user:id,name'])
            ->paginate(25);

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
    public function getForAdminShow($id) {
        return $this->startConditions()->find($id);
    }
}
