<?php

namespace App\Repositories;

use App\Models\User as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository.
 */
class UserRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Return collection of user for list with pagination
     *
     * @param int $count Users per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count = 25)
    {
        $columns = ['id', 'name', 'manager', 'email',];

        $result = $this->startConditions()
            ->select($columns)
            ->withCount('orders')
            ->oldest('id')
            ->paginate($count);

        return $result;
    }

    /**
     * Return one order for admin
     *
     * @param int $id Target user id
     * @return Model
     */
    public function getForShow($id) {
        return $this->startConditions()->find($id);
    }

    /**
     * @param int $id Target user id
     * @return Model
     */
    public function getForEdit($id)
    {
        $columns = ['id', 'name', 'email',];

        $result = $this->startConditions()
            ->select($columns)
            ->where('id', $id)
            ->with('roles:id,name')
            ->first();

        return $result;
    }
}
