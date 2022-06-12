<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;
use App\Models\v1\TenderDetail;

class TenderTransformer extends AbstractTransformer
{
    public function transform(AbstractModel $tender)
    {
        $data = $tender->toArray();

        $data = array_merge_recursive(
            [
                'tenderDetail' => TenderDetail::where('tenderId', $tender->id)->first()
            ],
            $data
        );

        return $data;
    }
}
