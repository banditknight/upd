<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;

/**
 * App\Models\v1\Tender
 *
 * @property int $id
 * @property string $number
 * @property string $name
 * @property int $purchasingOrganizationId
 * @property int $scopeOfWorkId
 * @property string $lingkupPekerjaan
 * @property int $tenderTypeId
 * @property int $tenderDetailId
 * @property int $bidSubmissionMethodId
 * @property int $fromDate
 * @property int $toDate
 * @property int $registrationFromDate
 * @property int $registrationToDate
 * @property int $preQualificationFromDate
 * @property int $preQualificationToDate
 * @property int $sectorId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $bid_document_requirements
 * @property-read mixed $bid_submission_method
 * @property-read string $from
 * @property-read mixed $from_date_formatted
 * @property-read mixed $general_documents
 * @property-read mixed $items
 * @property-read mixed $pre_qualification_from_date_formatted
 * @property-read mixed $pre_qualification_to_date_formatted
 * @property-read mixed $purchasing_organization
 * @property-read mixed $registration_from_date_formatted
 * @property-read mixed $registration_to_date_formatted
 * @property-read mixed $scope_of_work
 * @property-read mixed $sector
 * @property-read mixed $status
 * @property-read mixed $tender_type
 * @property-read string $to
 * @property-read mixed $to_date_formatted
 * @property-read \App\Models\v1\TenderParticipant $onGoingTender
 * @property-write mixed $from_date
 * @property-write mixed $pre_qualification_from_date
 * @property-write mixed $pre_qualification_to_date
 * @property-write mixed $registration_from_date
 * @property-write mixed $registration_to_date
 * @property-write mixed $to_date
 * @method static \Database\Factories\v1\TenderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereBidSubmissionMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereLingkupPekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender wherePreQualificationFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender wherePreQualificationToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender wherePurchasingOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereRegistrationFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereRegistrationToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereScopeOfWorkId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereSectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereTenderDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereTenderTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $deliveryLocation
 * @property int $purchasingGroupId
 * @property int $incotermId
 * @property bool $isPreQualification
 * @property bool $isBidBond
 * @property bool $isEAuction
 * @property bool $isEAanwijzing
 * @property bool|null $noteForVendor
 * @property string|null $marking
 * @property string|null $currentPlace
 * @property string|null $project
 * @property int $docStatusId
 * @property-read mixed $incoterm
 * @property-read mixed $purchasing_group
 * @property-read mixed $doc_status
 * @property-read mixed $total_participant
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereCurrentPlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereDeliveryLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereIncotermId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereIsBidBond($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereIsEAanwijzing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereIsEAuction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereIsPreQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereMarking($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereNoteForVendor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender wherePurchasingGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereDocStatus($value)
 */
class Tender extends AbstractModel
{
    use HasFactory, WorkflowTrait;

    protected $fillable = [
        'number',
        'name',
        'purchasingOrganizationId',
        'scopeOfWorkId',
        'tenderTypeId',
        'tenderDetailId',
        'bidSubmissionMethodId',
        'fromDate',
        'toDate',
        'sectorId',
        'registrationFromDate',
        'registrationToDate',
        'preQualificationFromDate',
        'preQualificationToDate',
        'project',
        'docStatusId',
        'deliveryLocation',
        'purchasingGroupId',
        'incotermId',
        'isPreQualification',
        'isBidBond',
        'isEAuction',
        'isEAanwijzing',
        'noteForVendor',
        'lingkupPekerjaan',
        'buyerId',
        'tenderUserId',
    ];

    protected $hidden = [
        'tenderDetailId',
        'tenderTypeId',
        'scopeOfWorkId',
        'bidSubmissionMethodId',
        'purchasingOrganizationId',
        'purchasingGroupId',
        'incotermId',
        'sectorId',
        'fromDate',
        'toDate',
        'docStatusId',
        'registrationFromDate',
        'registrationToDate',
        'preQualificationFromDate',
        'preQualificationToDate',
        'updated_at',
        'created_at',
        'buyerId',
        'tenderUserId',
    ];

    protected $appends = [
        'tenderType',
        'scopeOfWork',
        'bidSubmissionMethod',
        'purchasingOrganization',
        'purchasingGroup',
        'incoterm',
        'sector',
        'fromDateFormatted',
        'toDateFormatted',
        'registrationFromDateFormatted',
        'registrationToDateFormatted',
        'preQualificationFromDateFormatted',
        'preQualificationToDateFormatted',
        'generalDocuments',
        'items',
        'bidDocumentRequirements',
        'status',
        'docStatus',
        'totalParticipant',
        'linkedPr',
        'buyer',
        'tenderUser',
    ];

    protected $casts = [
        'isBidBond' => 'boolean',
        'isEAuction' => 'boolean',
        'isEAanwijzing' => 'boolean',
        'isPreQualification' => 'boolean',
        'noteForVendor' => 'boolean'
    ];

    /**
     *
     * @param  integer  $value
     * @return string
     */
    public function getFromAttribute($value)
    {
        return Carbon::createFromTimestamp($value)->format('d-M-Y');
    }

    /**
     *
     * @param  integer  $value
     * @return string
     */
    public function getToAttribute($value)
    {
        return Carbon::createFromTimestamp($value)->format('d-M-Y');
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

    public function getBidSubmissionMethodAttribute($value)
    {
        return BidSubmissionMethod::find($this->bidSubmissionMethodId);
    }

    public function getScopeOfWorkAttribute($value)
    {
        return ScopeOfWork::find($this->scopeOfWorkId);
    }

    public function getTenderTypeAttribute($value)
    {
        return TenderType::find($this->tenderTypeId);
    }

    public function getFromDateFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->fromDate,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->fromDate)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->fromDate)->format('d-m-Y H:i')
        ];
    }

    public function getToDateFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->toDate,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->toDate)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->toDate)->format('d-m-Y H:i')
        ];
    }

    public function getRegistrationFromDateFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->registrationFromDate,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->registrationFromDate)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->registrationFromDate)->format('d-m-Y H:i')
        ];
    }

    public function getRegistrationToDateFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->registrationToDate,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->registrationToDate)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->registrationToDate)->format('d-m-Y H:i')
        ];
    }

    public function getPreQualificationFromDateFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->preQualificationFromDate,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->preQualificationFromDate)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->preQualificationFromDate)->format('d-m-Y H:i')
        ];
    }

    public function getPreQualificationToDateFormattedAttribute($value)
    {
        return [
            'timestamp' => $this->preQualificationToDate,
            'humanReadAbleDate' => Carbon::createFromTimestamp($this->preQualificationToDate)->format('d-m-Y'),
            'humanReadAbleDateTime' => Carbon::createFromTimestamp($this->preQualificationToDate)->format('d-m-Y H:i')
        ];
    }

    public function setFromDateAttribute($value)
    {
        $this->attributes['fromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setToDateAttribute($value)
    {
        $this->attributes['toDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setRegistrationFromDateAttribute($value)
    {
        $this->attributes['registrationFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setRegistrationToDateAttribute($value)
    {
        $this->attributes['registrationToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setPreQualificationFromDateAttribute($value)
    {
        if($value==null){
            return;
        }
        $this->attributes['preQualificationFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setPreQualificationToDateAttribute($value)
    {
        if($value==null){
            return;
        }
        $this->attributes['preQualificationToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getGeneralDocumentsAttribute($value)
    {
        return TenderDocument::where('tenderId', '=', $this->id)->get();
    }

    public function getItemsAttribute($value)
    {
        return TenderItem::where('tenderId', '=', $this->id)->get();
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

    public function getBidDocumentRequirementsAttribute($value)
    {
        return [
            // @todo add bid document requirements
        ];
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

    public function onGoingTender()
    {
        return $this->belongsTo(TenderParticipant::class)->whereRaw('ok is null');
    }

    public function getDocStatusAttribute()
    {
        $docStatus = DocStatus::find($this->docStatusId);

        if (!$docStatus) {
            return 666;
        }

        return $docStatus;
    }

    public function getTotalParticipantAttribute()
    {
        $user = auth()->user();

        if (!$user) {
            return 0;
        }

        if (!$user->hasRole('superAdmin')) {
            return 0;
        }

        $tenderParticipantCount = TenderParticipant::query()->where([
            ['tenderId', '=', $this->id]
        ])->count();

        return $tenderParticipantCount ?? 0;
    }

    public function getLinkedPrAttribute($value)
    {
        $prs = [];
        foreach ($this->items as $item) {
            if(!empty($item->itemPr->purchaseRequest)){
                if(in_array($item->itemPr->purchaseRequest['no'],$prs)) continue;
                $prs[] = $item->itemPr->purchaseRequest['no'];
            }
        }
        return $prs;
    }

    public function getBuyerAttribute(){
        return User::find($this->buyerId)->only(['id','name']);
    }

    public function getTenderUserAttribute(){
        return User::find($this->tenderUserId)->only(['id','name']);
    }
}