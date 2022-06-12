<?php

namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface;
use App\Models\v1\TenderRequirementDocument;

class TenderProcessCommercial implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        if (!$model instanceof TenderRequirementDocument) {
            return $model;
        }

        $model = $model
            ->select([
                'tenderProcessCommercials.attachment',
                'tenderRequirementDocuments.description',
                'tenderRequirementDocuments.id',
                'tenderRequirementDocuments.isMandatory',
                'tenderRequirementDocuments.name',
                'tenderRequirementDocuments.stepType',
                'tenderRequirementDocuments.tenderId',
                'tenderProcessCommercials.id AS finished'
            ])
            ->where('tenderRequirementDocuments.commercial', '=', 1)
            ->leftJoin('tenderProcessCommercials', function($join) {
                $join
                    ->on('tenderProcessCommercials.tenderRequirementDocumentId', '=', 'tenderRequirementDocuments.id')
                    ->where('tenderProcessCommercials.isDeleted', '=', 0);
            });

        return $model;
    }
}
