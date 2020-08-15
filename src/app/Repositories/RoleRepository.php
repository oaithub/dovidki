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
     * Return collection of roles for list with pagination
     *
     * @param int $count Roles per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count = 25)
    {
        $columns = ['id', 'name', 'description'];

        $result = $this->startConditions()
            ->select($columns)
            //->with(['permissions:id,name'])
            ->paginate($count);

        return $result;
    }

    /**
     * Return collection of all roles
     *
     * @return Collection
     */
    public function getAllForList()
    {
        $columns = ['id', 'name', 'description'];

        $result = $this->startConditions()
            ->select($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * Return one role for edit
     *
     *  @param int $id Target role id
     *  @return Model
     */
    public function getForEdit($id)
    {
        return $this->startConditions()
            ->where('id', $id)
            ->with(['permissions:id,name'])
            ->first();
    }

    /**
     * Return one role for show
     *
     * @param int $id Target role id
     * @return Model
     */
    public function getForShow($id) {
        return $this->startConditions()->find($id);
    }
}
