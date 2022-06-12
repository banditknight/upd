<?php

namespace App\Application;

use App\Contracts\Transformable;
use App\Contracts\TransformerInterface;
use App\Models\v1\AbstractModel;
use League\Fractal\TransformerAbstract;

abstract class AbstractTransformer extends TransformerAbstract implements TransformerInterface
{
    public function transform(AbstractModel $abstractModel)
    {
        if ($abstractModel instanceof Transformable) {
            return $abstractModel->transform();
        }

        return $abstractModel->toArray();
    }
}
