<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class ReferenceTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $reference)
    {
        $data = [
            'id' => $reference->id,
            'name' => $reference->name
        ];

        return $data;
    }
}
