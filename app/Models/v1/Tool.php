<?php

namespace App\Models\v1;

/**
 * App\Models\v1\Tool
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $toolTypeId
 * @property int $total
 * @property string $description
 * @property string $capacity
 * @property string $brand
 * @property int $isNew
 * @property string $location
 * @property int $toolOwnerTypeId
 * @property string $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereBrand($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereToolOwnerTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereToolTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tool whereVendorId($value)
 * @mixin \Eloquent
 * @property-read mixed $tool_owner_type
 * @property-read mixed $tool_type
 */
class Tool extends AbstractModel
{

    protected $fillable = [
        'userId',
        'vendorId',
        'toolTypeId',
        'total',
        'description',
        'capacity',
        'brand',
        'isNew',
        'location',
        'toolOwnerTypeId',
        'attachment',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'toolTypeId',
        'toolOwnerTypeId',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'toolType',
        'toolOwnerType',
    ];

    public function getToolTypeAttribute()
    {
        return ToolType::find($this->toolTypeId);
    }

    public function getToolOwnerTypeAttribute()
    {
        return ToolOwnerType::find($this->toolOwnerTypeId);
    }

}
