<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class OrderRepository.
 */
class RoleRepository extends CoreRepository
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
        $columns = ['id', 'name',];

        $result = $this->startConditions()
            ->select($columns)
            //->with(['permissions:id,name'])
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
