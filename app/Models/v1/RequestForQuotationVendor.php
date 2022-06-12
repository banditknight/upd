<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;

class RequestForQuotationVendor extends AbstractModel
{
    protected $table = 'requestForQuotationVendors';

    protected $fillable = [
        'rfqId',
        'invitedVendorId',
        'description'
    ];

    protected $hidden = [
        'rfqId',
        'invitedVendorId',
    ];

    protected $appends = [
        'RequestForQuotation',
        'vendor',
    ];

    public function getRequestForQuotationAttribute()
    {
        return RequestForQuotation::find($this->rfqId)->only(['id','name','number']);
    }

    public function getVendorAttribute()
    {
        return Vendor::find($this->invitedVendorId)->only(['id','name','registrationNumber']);
    }
}
