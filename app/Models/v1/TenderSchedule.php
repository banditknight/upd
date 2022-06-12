<?php

namespace App\Models\v1;

use Carbon\Carbon;

/**
 * App\Models\v1\TenderSchedule
 *
 * @property int $id
 * @property int $tenderId
 * @property int $fromDate
 * @property int $toDate
 * @property int $registrationFromDate
 * @property int $registrationToDate
 * @property int $preQualificationFromDate
 * @property int $preQualificationToDate
 * @property int $downloadDocumentTenderFromDate
 * @property int $downloadDocumentTenderToDate
 * @property int $aanwijzingFromDate
 * @property int $aanwijzingToDate
 * @property int $tenderFromDate
 * @property int $tenderToDate
 * @property int $bidOpeningFromDate
 * @property int $bidOpeningToDate
 * @property int $clarificationFromDate
 * @property int $clarificationToDate
 * @property int $auctionFromDate
 * @property int $auctionToDate
 * @property int $listOfWinnerFromDate
 * @property int $listOfWinnerToDate
 * @property int $approvalListOfWinnerFromDate
 * @property int $approvalListOfWinnerToDate
 * @property int $objectionFromDate
 * @property int $objectionToDate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $aanwijzing_from_date
 * @property-write mixed $aanwijzing_to_date
 * @property-write mixed $approval_list_of_winner_from_date
 * @property-write mixed $approval_list_of_winner_to_date
 * @property-write mixed $auction_from_date
 * @property-write mixed $auction_to_date
 * @property-write mixed $bid_opening_from_date
 * @property-write mixed $bid_opening_to_date
 * @property-write mixed $clarification_from_date
 * @property-write mixed $clarification_to_date
 * @property-write mixed $download_document_tender_from_date
 * @property-write mixed $download_document_tender_to_date
 * @property-write mixed $from_date
 * @property-write mixed $list_of_winner_from_date
 * @property-write mixed $list_of_winner_to_date
 * @property-write mixed $objection_from_date
 * @property-write mixed $objection_to_date
 * @property-write mixed $pre_qualification_from_date
 * @property-write mixed $pre_qualification_to_date
 * @property-write mixed $registration_from_date
 * @property-write mixed $registration_to_date
 * @property-write mixed $tender_from_date
 * @property-write mixed $tender_to_date
 * @property-write mixed $to_date
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereAanwijzingFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereAanwijzingToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereApprovalListOfWinnerFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereApprovalListOfWinnerToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereAuctionFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereAuctionToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereBidOpeningFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereBidOpeningToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereClarificationFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereClarificationToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereDownloadDocumentTenderFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereDownloadDocumentTenderToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereListOfWinnerFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereListOfWinnerToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereObjectionFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereObjectionToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule wherePreQualificationFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule wherePreQualificationToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereRegistrationFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereRegistrationToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereTenderFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereTenderToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereToDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderSchedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderSchedule extends AbstractModel
{
    protected $table = 'tenderSchedules';

    protected $fillable = [
        'tenderId',

        'fromDate',
        'toDate',

        'registrationFromDate',
        'registrationToDate',

        'preQualificationFromDate',
        'preQualificationToDate',

        'downloadDocumentTenderFromDate',
        'downloadDocumentTenderToDate',

        'aanwijzingFromDate',
        'aanwijzingToDate',

        'tenderFromDate',
        'tenderToDate',

        'bidOpeningFromDate',
        'bidOpeningToDate',

        'clarificationFromDate',
        'clarificationToDate',

        'auctionFromDate',
        'auctionToDate',

        'listOfWinnerFromDate',
        'listOfWinnerToDate',

        'approvalListOfWinnerFromDate',
        'approvalListOfWinnerToDate',

        'objectionFromDate',
        'objectionToDate',
    ];

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
        $this->attributes['preQualificationFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setPreQualificationToDateAttribute($value)
    {
        $this->attributes['preQualificationToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setDownloadDocumentTenderFromDateAttribute($value)
    {
        $this->attributes['downloadDocumentTenderFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setDownloadDocumentTenderToDateAttribute($value)
    {
        $this->attributes['downloadDocumentTenderToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setAanwijzingFromDateAttribute($value)
    {
        $this->attributes['aanwijzingFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setAanwijzingToDateAttribute($value)
    {
        $this->attributes['aanwijzingToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setTenderFromDateAttribute($value)
    {
        $this->attributes['tenderFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setTenderToDateAttribute($value)
    {
        $this->attributes['tenderToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setBidOpeningFromDateAttribute($value)
    {
        $this->attributes['bidOpeningFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setBidOpeningToDateAttribute($value)
    {
        $this->attributes['bidOpeningToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setClarificationFromDateAttribute($value)
    {
        $this->attributes['clarificationFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setClarificationToDateAttribute($value)
    {
        $this->attributes['clarificationToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setAuctionFromDateAttribute($value)
    {
        $this->attributes['auctionFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setAuctionToDateAttribute($value)
    {
        $this->attributes['auctionToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setListOfWinnerFromDateAttribute($value)
    {
        $this->attributes['listOfWinnerFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setListOfWinnerToDateAttribute($value)
    {
        $this->attributes['listOfWinnerToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setApprovalListOfWinnerFromDateAttribute($value)
    {
        $this->attributes['approvalListOfWinnerFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setApprovalListOfWinnerToDateAttribute($value)
    {
        $this->attributes['approvalListOfWinnerToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setObjectionFromDateAttribute($value)
    {
        $this->attributes['objectionFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setObjectionToDateAttribute($value)
    {
        $this->attributes['objectionToDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }
}
