<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;

class TenderBlockedVendor extends AbstractModel
{
    protected $table = 'tenderBlockedVendors';

    protected $fillable = [
        'tenderId',
        'blockedVendorId',
        'description'
    ];
    
    protected $hidden = [
        'tenderId',
        'blockedVendorId',
    ];

    protected $appends = [
        'tender',
        'vendor',
    ];

    public function getTenderAttribute()
    {
        return Tender::find($this->tenderId)->only(['id','name','registrationNumber']);
    }

    public function getVendorAttribute()
    {
        return Vendor::find($this->blockedVendorId)->only(['id','name','registrationNumber']);
    }
}
