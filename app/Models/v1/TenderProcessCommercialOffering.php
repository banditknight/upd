<?php

namespace App\Models\v1;

use Carbon\Carbon;

class TenderProcessCommercialOffering extends AbstractModel
{
    protected $table = 'tenderProcessCommercialOfferings';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'number',
        'fromDate',
        'toDate',
        'bidAttachment',
        'additionalCost',
        'note',
        'bidGuaranteeValue',
        'bidGuaranteeAttachment',
        'bidGuaranteeExpired',
        'incotermId',
        'incotermNote',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'incotermId',
        'updated_at',
        'created_at'
    ];

    protected $appends = [
        'incoterm'
    ];

    public function setFromDateAttribute($value)
    {
        $this->attributes['fromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setToDateAttribute($value)
    {
        $this->attributes['toDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setBidGuaranteeExpiredAttribute($value)
    {
        $this->attributes['bidGuaranteeExpired'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getIncotermAttribute()
    {
        return TenderIncoterm::find($this->incotermId);
    }
}
