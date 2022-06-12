<?php

namespace App\Models\v1;

use Illuminate\Support\Carbon;

class TenderProcessDocumentPraQualification extends AbstractModel
{
    protected $table = 'tenderProcessDocumentPraQualifications';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'tenderRequirementDocumentId',
        'attachment',
        'status',
    ];

    protected $appends = [
        'vendor',
        'submitDate'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function getVendorAttribute()
    {
        return Vendor::find($this->vendorId)->only(['id', 'name', 'registrationNumber']);
    }

    public function getSubmitDateAttribute()
    {
        return Carbon::parse($this->created_at)->timestamp;
    }
}
