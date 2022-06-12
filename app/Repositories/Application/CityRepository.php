<?php

namespace App\Repositories\Application;

use App\Repositories\AbstractRepository;

class CityRepository extends AbstractRepository
{
    public function findByFilter($filter)
    {
        $provinceId = $filter['provinceId'];
        $cityByProvinceId = $this->findBy('province_id', $provinceId);
        if (!$cityByProvinceId) {
            return null;
        }

        return $cityByProvinceId->paginate($filter['limit'] ?: 10);
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        $findModelByColumn = $this->model::where($field, '=', $value);

        return $findModelByColumn ?: null;
    }
}
