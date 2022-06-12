<?php

namespace App\Models\v1;

class TenderProcessTechnical extends AbstractModel
{
    protected $table = 'tenderProcessTechnicals';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'tenderRequirementDocumentId',
        'attachment',
    ];
}
