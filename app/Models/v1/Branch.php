<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Branch
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property string $name
 * @property string $address
 * @property int $countryId
 * @property string $postalCode
 * @property string $phone
 * @property string|null $phoneExt
 * @property string $faxMailNumber
 * @property string|null $faxMailNumberExt
 * @property string $email
 * @property string $website
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch query()
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereFaxMailNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereFaxMailNumberExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePhoneExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Branch whereWebsite($value)
 * @mixin \Eloquent
 * @property-read mixed $country
 */
class Branch extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'name',
        'address',
        'countryId',
        'postalCode',
        'email',
        'website',
        'phone',
        'phoneExt',
        'faxMailNumber',
        'faxMailNumberExt'
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'countryId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'country'
    ];

    public function getCountryAttribute()
    {
        return Country::find($this->countryId);
    }
}
