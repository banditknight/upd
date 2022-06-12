<?php

namespace App\Traits;

use App\Models\v1\AssessmentCriteriaItem;

trait AssessmentCriteriaItemTrait
{
    public function submitItem(array $data, int $tenderId, int $tenderItemId, int $assessmentCriteriaId)
    {
        AssessmentCriteriaItem::factory()
            ->count(count($data))
            ->create()
            ->each(function($item, $key) use($data, $tenderId, $tenderItemId, $assessmentCriteriaId)
            {
                $item->tenderId = $tenderId;
                $item->tenderItemId = $tenderItemId;
                $item->assessmentCriteriaId = $assessmentCriteriaId;
                $item->name = $data[$key]['name'] ?? null;
                $item->code = $data[$key]['code'] ?? null;
                $item->description = $data[$key]['description'] ?? null;
                $item->point = $data[$key]['point'] ?? null;
                $item->parentId = $data[$key]['parentId'] ?? null;
                $item->isSummary = $data[$key]['isSummary'] ?? null;

                $item->save();
        });
    }
}
