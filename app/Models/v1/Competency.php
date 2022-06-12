<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Competency
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $businessTypeId
 * @property int $subBusinessTypeId
 * @property string $descriptionOfExperience
 * @property int $vendorTypeId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\CompetencyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Competency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Competency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereBusinessTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereDescriptionOfExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereSubBusinessTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereVendorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Competency whereVendorTypeId($value)
 * @mixin \Eloquent
 */
class Competency extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'vendorId',
        'businessTypeId',
        'subBusinessTypeId',
        'descriptionOfExperience',
        'vendorTypeId',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'businessTypeId',
        'subBusinessTypeId',
        'vendorTypeId',
    ];

    protected $appends = [
        'businessType',
        'subBusinessType',
        'vendorType',
    ];

    public function getBusinessTypeAttribute(){
        return BusinessType::find($this->businessTypeId)->only(['id','code','name']);
    }
    public function getSubBusinessTypeAttribute(){
        return SubBusinessType::find($this->subBusinessTypeId)->only(['id','code','name']);
    }
    public function getVendorTypeAttribute(){
        return VendorTypeInformation::find($this->vendorTypeId)->only(['id','code','name']);
    }
}
