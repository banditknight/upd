<?php

namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface;
use App\Models\v1\TenderRequirementDocument;

class TenderProcessPraQualificationCriteria implements CriteriaInterface
{
    public function apply($model, RepositoryInterface $repository)
    {
        if (!$model instanceof TenderRequirementDocument) {
            return $model;
        }

        $model = $model
            ->select([
                'tenderProcessDocumentPraQualifications.attachment',
                'tenderRequirementDocuments.description',
                'tenderRequirementDocuments.id',
                'tenderRequirementDocuments.isMandatory',
                'tenderRequirementDocuments.name',
                'tenderRequirementDocuments.stepType',
                'tenderRequirementDocuments.tenderId',
                'tenderProcessDocumentPraQualifications.id AS finished'
            ])
            ->where('tenderRequirementDocuments.praQualification', '=', 1)
            ->leftJoin('tenderProcessDocumentPraQualifications', function($join) {
                $join->on(
                    'tenderProcessDocumentPraQualifications.tenderRequirementDocumentId', '=', 'tenderRequirementDocuments.id'
                )->where('tenderProcessDocumentPraQualifications.isDeleted', '=', 0);
            });

        return $model;
    }
}
