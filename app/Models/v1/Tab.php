<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Tab
 *
 * @property int $id
 * @property int|null $windowId
 * @property int|null $tabGroupId
 * @property string $name
 * @property string $description
 * @property string $endPoint
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $fields
 * @method static \Database\Factories\v1\TabFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tab newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tab query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereEndPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereTabGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tab whereWindowId($value)
 * @mixin \Eloquent
 */
class Tab extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'windowId',
        'tabGroupId',
        'name',
        'description',
        'endPoint',
    ];

    protected $appends = [
        'fields'
    ];

    protected $hidden = [
        'windowId',
        'tabGroupId',
        'created_at',
        'updated_at'
    ];

    public function getFieldsAttribute()
    {
        return Field::all()->where('tabId', '=', $this->id)->except(['id']);
    }
}
