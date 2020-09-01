<?php

namespace App\Repositories;

use App\Models\OrderState as Model;
use Illuminate\Support\Collection;

/**
 * Class OrderStateRepository.
 */
class OrderStateRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Return array of order states id
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
