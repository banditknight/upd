<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class DistrictTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $district)
    {
        return [
            'id' => $district->id,
            'name' => $district->name,
            'cityId' => (int)$district->city_id
        ];
    }
}
