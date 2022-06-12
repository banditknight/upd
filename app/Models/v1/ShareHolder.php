<?php

namespace App\Models\v1;

/**
 * App\Models\v1\ShareHolder
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property string $name
 * @property int $nationalityId
 * @property int $sharePercentage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereSharePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereVendorId($value)
 * @mixin \Eloquent
 * @property int $taxIdentificationNumber
 * @property int $taxIdentificationAttachment
 * @property int $ktpNumber
 * @property int $ktpAttachment
 * @property int $kitasNumber
 * @property int $kitasAttachment
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereKitasAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereKitasNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereKtpAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereKtpNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereTaxIdentificationAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShareHolder whereTaxIdentificationNumber($value)
 */
class ShareHolder extends AbstractModel
{
    protected $table = 'shareHolders';

    protected $fillable = [
        'userId',
        'vendorId',
        'name',
        'nationalityId',
        'sharePercentage',

        'taxIdentificationNumber',
        'taxIdentificationAttachment',
        'ktpNumber',
        'ktpAttachment',
        'kitasNumber',
        'kitasAttachment',
    ];

    protected $hidden = [
        'vendorId',
        'userId',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'nationality'
    ];

    public function getNationalityAttribute()
    {
        return Nationality::find($this->nationalityId);
    }
}
