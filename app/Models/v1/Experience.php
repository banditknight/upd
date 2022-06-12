<?php

namespace App\Models\v1;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Experience
 *
 * @property int $id
 * @property int|null $userId
 * @property int|null $vendorId
 * @property int $businessTypeId
 * @property int $subBusinessTypeId
 * @property string $workPackageName
 * @property string $workPackageLocation
 * @property string $contactOwner
 * @property string $address
 * @property int $countryId
 * @property int $provinceId
 * @property int $cityId
 * @property int $districtId
 * @property string $postalCode
 * @property string $contactPerson
 * @property string $phoneNumber
 * @property string $contractNumber
 * @property int $validFromDate
 * @property int $validThruDate
 * @property int $currencyId
 * @property int $contractValue
 * @property int $contractHandOverLetterDate
 * @property int $contractHandOverLetterNumber
 * @property int $contractHandOverLetterAttachment
 * @property string $testimony
 * @property int $testimonyAttachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $contract_hand_over_letter_date
 * @property-write mixed $valid_from_date
 * @property-write mixed $valid_thru_date
 * @method static \Database\Factories\v1\ExperienceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereBusinessTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContactOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContactPerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContractHandOverLetterAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContractHandOverLetterDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContractHandOverLetterNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContractNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereContractValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereSubBusinessTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereTestimony($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereTestimonyAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereValidFromDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereValidThruDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereWorkPackageLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereWorkPackageName($value)
 * @mixin \Eloquent
 * @property-read mixed $business_type
 * @property-read mixed $city
 * @property-read mixed $country
 * @property-read mixed $currency
 * @property-read mixed $district
 * @property-read mixed $province
 * @property-read mixed $sub_business_type
 */
class Experience extends AbstractModel
{
    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = [
        'userId',
        'vendorId',
        'businessTypeId',
        'subBusinessTypeId',
        'workPackageName',
        'workPackageLocation',
        'contactOwner',
        'address',
        'countryId',
        'provinceId',
        'cityId',
        'districtId',
        'postalCode',
        'contactPerson',
        'phoneNumber',
        'contactEmail',
        'contractNumber',
        'validFromDate',
        'validThruDate',
        'currencyId',
        'contractValue',
        'contractHandOverLetterDate',
        'contractHandOverLetterNumber',
        'contractHandOverLetterAttachment',
        'testimony',
        'testimonyAttachment',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'businessTypeId',
        'subBusinessTypeId',
        'countryId',
        'provinceId',
        'cityId',
        'districtId',
        'currencyId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'businessType',
        'subBusinessType',
        'country',
        'province',
        'city',
        'district',
        'currency',
    ];


    public function setContractHandOverLetterDateAttribute($value)
    {
        $this->attributes['contractHandOverLetterDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setValidFromDateAttribute($value)
    {
        $this->attributes['validFromDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function setValidThruDateAttribute($value)
    {
        $this->attributes['validThruDate'] = Carbon::createFromFormat('d-m-Y', $value)->timestamp;
    }

    public function getBusinessTypeAttribute()
    {
        return BusinessType::find($this->businessTypeId)->only(['id', 'code', 'name']);
    }

    public function getSubBusinessTypeAttribute()
    {
        return SubBusinessType::find($this->subBusinessTypeId)->only(['id', 'code', 'name']);
    }

    public function getCountryAttribute()
    {
        return Country::find($this->countryId)->only(['id', 'code', 'name', 'currencyCode']);
    }

    public function getProvinceAttribute()
    {
        return Province::find($this->provinceId);
    }

    public function getCityAttribute()
    {
        return City::find($this->cityId);
    }

    public function getDistrictAttribute()
    {
        return District::find($this->districtId);
    }

    public function getCurrencyAttribute()
    {
        return Currency::find($this->currencyId)->only(['id', 'code', 'name']);
    }

}
