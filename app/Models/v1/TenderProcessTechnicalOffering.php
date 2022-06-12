<?php

namespace App\Models\v1;

use Carbon\Carbon;

class TenderProcessTechnicalOffering extends AbstractModel
{
    protected $table = 'tenderProcessTechnicalOfferings';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'number',
        'fromDate',
        'toDate',
        'bidAttachment',
        'handOverInDay',
        'note',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'updated_at',
        'created_at'
    ];

    protected $appends = [
        'vendor'
    ];

    public function setFromDateAttribute($value)
    {
        $this->attributes['fromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setToDateAttribute($value)
    {
        $this->attributes['toDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getVendorAttribute(){
        return Vendor::find($this->vendorId)->only(['id','registrationNumber','name']);
    }
}
