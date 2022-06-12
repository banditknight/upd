<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class ProvinceTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $province)
    {
        return [
            'id' => $province->id,
            'name' => $province->name
        ];
    }
}
