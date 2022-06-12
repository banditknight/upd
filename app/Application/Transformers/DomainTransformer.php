<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class DomainTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $domain)
    {
        $data = [
            'id' => $domain->id,
            'name' => $domain->name,
            'location' => $domain->location
        ];

        return $data;
    }
}
