<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderInvitedVendor
 *
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderInvitedVendor whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class TenderInvitedVendor extends AbstractModel
{
    protected $table = 'tenderInvitedVendors';

    protected $fillable = [
        'tenderId',
        'invitedVendorId',
        'description'
    ];

    protected $hidden = [
        'tenderId',
        'invitedVendorId',
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
        return Vendor::find($this->invitedVendorId)->only(['id','name','registrationNumber']);
    }
}
