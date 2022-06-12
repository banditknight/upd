<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\RequestForQuotation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\RequestForQuotationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestForQuotation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestForQuotation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestForQuotation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestForQuotation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestForQuotation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestForQuotation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RequestForQuotation extends AbstractModel
{
    use HasFactory;

    protected $table = 'requestForQuotations';


    protected $fillable = [
        'number',
        'name',
        'purchasingOrganizationId',
        'scopeOfWorkId',
        'tenderTypeId',
        'tenderDetailId',
        'dateRequired',
        'sectorId',
        'projectId',
        'docStatusId',
        'deliveryLocation',
        'purchasingGroupId',
        'incotermId',
        'noteForVendor',
        'lingkupPekerjaan',
        'marking',
        'buyerId',
    ];

    protected $hidden = [
        'scopeOfWorkId',
        'purchasingOrganizationId',
        'purchasingGroupId',
        'incotermId',
        'sectorId',
        'dateRequired',
        'docStatusId',
        'updated_at',
        'created_at',
        'buyerId',
    ];


    protected $appends = [
        'scopeOfWork',
        'purchasingOrganization',
        'purchasingGroup',
        'incoterm',
        'sector',
        'status',
        'docStatus',
        'buyer',
        'dateRequiredFormatted'
        // 'project',

    ];

    public function getDateRequiredFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->dateRequired,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->dateRequired)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->dateRequired)->format('d-m-Y H:i')
        ];
    }

    public function getScopeOfWorkAttribute($value)
    {
        return ScopeOfWork::find($this->scopeOfWorkId);
    }

    public function getPurchasingOrganizationAttribute($value)
    {
        $purchasingOrganization = PurchasingOrganization::find($this->purchasingOrganizationId);

        if (!$purchasingOrganization) {
            return null;
        }

        return $purchasingOrganization->only(['id', 'code', 'name']);
    }

    public function getSectorAttribute($value)
    {
        return Sector::find($this->sectorId);
    }

    public function getPurchasingGroupAttribute($value)
    {
        $purchasingGroup = PurchasingGroup::find($this->purchasingGroupId);

        if (!$purchasingGroup) {
            return null;
        }

        return $purchasingGroup->only(['id', 'code', 'name']);
    }

    public function getIncotermAttribute($value)
    {
        $incoterm = TenderIncoterm::find($this->incotermId);

        if(!$incoterm){
            return null;
        }

        return $incoterm->only(['id','code','description']);
    }

    public function getDocStatusAttribute()
    {
        $docStatus = DocStatus::find($this->docStatusId);

        if (!$docStatus) {
            return 666;
        }

        return $docStatus;
    }

    public function getStatusAttribute()
    {
        $user = auth()->user();

        if (!$user) {
            return null;
        }

        if (!$user->hasRole('vendor')) {
            return null;
        }

        $joinStatusId = TenderParticipant::where([
            ['tenderId', '=', $this->id], ['vendorId', '=', $user->vendorId]
        ])->first();

        return $joinStatusId ? $joinStatusId['status'] : null;
    }

    public function getBuyerAttribute($value)
    {
        $buyer = User::find($this->buyerId);

        if(!$buyer){
            return null;
        }

        return $buyer;
    }
}
