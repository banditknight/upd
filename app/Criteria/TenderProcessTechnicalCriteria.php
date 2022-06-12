<?php

namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface;
use App\Models\v1\TenderRequirementDocument;

class TenderProcessTechnicalCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        if (!$model instanceof TenderRequirementDocument) {
            return $model;
        }

        $model = $model
            ->select([
                'tenderProcessTechnicals.attachment',
                'tenderRequirementDocuments.description',
                'tenderRequirementDocuments.id',
                'tenderRequirementDocuments.isMandatory',
                'tenderRequirementDocuments.name',
                'tenderRequirementDocuments.stepType',
                'tenderRequirementDocuments.tenderId',
                'tenderProcessTechnicals.id AS finished'
            ])
            ->where('tenderRequirementDocuments.technical', '=', 1)
            ->leftJoin('tenderProcessTechnicals', function($join) {
                $join
                    ->on('tenderProcessTechnicals.tenderRequirementDocumentId', '=', 'tenderRequirementDocuments.id')
                    ->where('tenderProcessTechnicals.isDeleted', '=', 0);
            });

        return $model;
    }
}
