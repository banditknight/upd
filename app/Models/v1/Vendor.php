<?php

namespace App\Models\v1;

use App\Models\MailableInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * App\Models\v1\Vendor
 *
 * @property int $id
 * @property string $domain
 * @property int $companyTypeId
 * @property string $name
 * @property int $vendorTypeInformation
 * @property string $presidentDirectorName
 * @property string $referenceId
 * @property string $address
 * @property string|null $secondAddress
 * @property int $countryId
 * @property int $provinceId
 * @property int $cityId
 * @property int $subDistrictId
 * @property string $postalCode
 * @property string $phone
 * @property string|null $phoneExt
 * @property string $faxMailNumber
 * @property string|null $faxMailNumberExt
 * @property string $email
 * @property string $website
 * @property string $picFullName
 * @property string $picMobileNumber
 * @property string $picEmail
 * @property string|null $tenderReferenceNumber
 * @property string $pkpNumber
 * @property string $pkpAttachment
 * @property string $taxIdentificationNumber
 * @property string $taxIdentificationAttachment
 * @property bool $isAcceptTermAndCondition
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCompanyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereFaxMailNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereFaxMailNumberExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereIsAcceptTermAndCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePhoneExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePicEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePicFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePicMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePkpAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePkpNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePresidentDirectorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereProvinceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereReferenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereSecondAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereSubDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTaxIdentificationAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTaxIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereTenderReferenceNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereVendorTypeInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereWebsite($value)
 * @mixin \Eloquent
 * @property int|null $picId
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor wherePicId($value)
 * @property int $domainId
 * @property int|null $districtId
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereDomainId($value)
 * @property string|null $registrationNumber
 * @property int $isActive
 * @property-read mixed $company_type
 * @method static \Database\Factories\v1\VendorFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereRegistrationNumber($value)
 * @property int $isCompleted
 * @method static \Illuminate\Database\Eloquent\Builder|Vendor whereIsCompleted($value)
 */
class Vendor extends AbstractModel implements MailableInterface
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domainId',
        'companyTypeId',
        'name',
        'vendorTypeInformation',
        'presidentDirectorName',
        'referenceId',
        'secondAddress',
        'address',
        'countryId',
        'provinceId',
        'cityId',
        'districtId',
        'postalCode',
        'phone',
        'phoneExt',
        'faxMailNumber',
        'faxMailNumberExt',
        'email',
        'website',
        'picId',
        'picFullName',
        'picMobileNumber',
        'picEmail',
        'tenderReferenceNumber',
        'pkpNumber',
        'pkpAttachment',
        'taxIdentificationNumber',
        'taxIdentificationAttachment',
        'isAcceptTermAndCondition',
        'isCompleted',
        'isActive',
        'registrationNumber',
        'description',
        'logo',
        'rating',
    ];

    protected $appends = [
        'companyType',
        'liquidity',
        'competency',
    ];

    public function toEmailAddress(): string
    {
        return $this->email;
    }

    public function toCcEmailAddress(): string
    {
        return $this->picEmail;
    }

    public function getCompanyTypeAttribute()
    {
        return $this->belongsTo(CompanyType::class, 'companyTypeId')->first();
    }

    public function getLiquidityAttribute()
    {
        $finance = FinancialStatement::where('vendorId',$this->id)->orderBy('year','desc')->first();
        if(!empty($finance)){
            return round(($finance->currentAssets+$finance->nonCurrentAssets+$finance->otherAssets)/($finance->currentPayable+$finance->otherPayable),2);
        }
        return null;
    }

    public function getCompetencyAttribute()
    {
        return $this->hasMany(Competency::class,'vendorId')->get();
    }

}
