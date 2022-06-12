<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class TermAndConditionTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $termAndCondition)
    {
        $data = [
            'title' => $termAndCondition->title,
            'content' => $termAndCondition->content
        ];

        return $data;
    }
}
