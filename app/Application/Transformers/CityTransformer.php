<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class CityTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $city)
    {
        return [
            'id' => $city->id,
            'name' => $city->name,
            'provinceId' => (int)$city->province_id
        ];
    }
}
