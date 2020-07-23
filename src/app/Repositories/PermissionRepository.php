<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class UserRepository.
 */
class PermissionRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Return collection of permissions for list with pagination
     *
     * @param int $count Permissions per page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($count = 10)
    {
        $columns = ['id', 'name',];

        $result = $this->startConditions()
            ->select($columns)
            //->with('roles:id,name')
            ->paginate($count);

        return $result;
    }

    /**
     * Return one permission
     *
     * @param int $id Target permission id
     * @return Model
     */
    public function getForShow($id) {
        return $this->startConditions()->find($id);
    }
}
