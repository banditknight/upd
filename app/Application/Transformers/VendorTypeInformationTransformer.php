<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class VendorTypeInformationTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $vendorTypeInformation)
    {
        return [
            'id' => $vendorTypeInformation->id,
            'name' => $vendorTypeInformation->name
        ];
    }
}
