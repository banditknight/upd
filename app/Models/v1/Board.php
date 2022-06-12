<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Board
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $boardTypeId
 * @property int $nationalityId
 * @property bool $isListed
 * @property bool $isCompanyHead
 * @property string $name
 * @property string $position
 * @property string $taxIdentificationNumber
 * @property string $taxIdentificationAttachment
 * @property string $ktpNumber
 * @property string $ktpAttachment
 * @property string $kitasNumber
 * @property string $kitasAttachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-write mixed $is_company_head
 * @property-write mixed $is_listed
 * @method static \Illuminate\Database\Eloquent\Builder|Board newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Board query()
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereBoardTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereIsCompanyHead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereIsListed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereKitasAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereKitasNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereKtpAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereKtpNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereNationalityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereTaxIdentificationAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereTaxIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Board whereVendorId($value)
 * @mixin \Eloquent
 */
class Board extends AbstractModel
{
    protected $fillable = [
        'userId',
        'vendorId',
        'boardTypeId',
        'nationalityId',
        'isListed',
        'isCompanyHead',
        'name',
        'position',
        'taxIdentificationNumber',
        'taxIdentificationAttachment',
        'ktpNumber',
        'ktpAttachment',
        'kitasNumber',
        'kitasAttachment',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
//        'boardTypeId',
//        'nationalityId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'boardType',
        'nationality',
    ];

    protected $casts = [
        'isListed' => 'boolean',
        'isCompanyHead' => 'boolean',
    ];

    public function setIsListedAttribute($value)
    {
        $this->attributes['isListed'] = (int)(boolean)$value;
    }

    public function setIsCompanyHeadAttribute($value)
    {
        $this->attributes['isCompanyHead'] = (int)(boolean)$value;
    }

    public function getBoardTypeAttribute()
    {
        return BoardType::find($this->boardTypeId);
    }

    public function getNationalityAttribute()
    {
        return Nationality::find($this->nationalityId);
    }
}
