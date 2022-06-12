<?php

namespace App\Repositories\Application;

use App\Repositories\AbstractRepository;

class DistrictRepository extends AbstractRepository
{
    public function findByFilter($filter)
    {
        $cityId = $filter['cityId'];
        $districtByCityId = $this->findBy('city_id', $cityId);
        if (!$districtByCityId) {
            return null;
        }

        return $districtByCityId->paginate($filter['limit'] ?: 10);
    }

    public function findBy(string $field, string $value, $columns = ['*'])
    {
        $findModelByColumn = $this->model::where($field, '=', $value);

        return $findModelByColumn ?: null;
    }
}
