<?php

namespace App\Models\v1;

class TenderProcessCommercial extends AbstractModel
{
    protected $table = 'tenderProcessCommercials';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'tenderRequirementDocumentId',
        'attachment',
    ];
}
