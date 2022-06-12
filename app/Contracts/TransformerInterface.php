<?php

namespace App\Contracts;

use App\Models\v1\AbstractModel;

interface TransformerInterface
{
    public function transform(AbstractModel $abstractModel);
}
