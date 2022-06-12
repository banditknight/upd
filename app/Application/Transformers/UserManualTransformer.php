<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;

class UserManualTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $userManual)
    {
        $data = [
            'title' => $userManual->title,
            'content' => $userManual->content,
        ];

        return $data;
    }
}
