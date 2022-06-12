<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TabGroup
 *
 * @property int $id
 * @property int $windowId
 * @property string $name
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $tabs
 * @method static \Database\Factories\v1\TabGroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TabGroup whereWindowId($value)
 * @mixin \Eloquent
 */
class TabGroup extends AbstractModel
{
    use HasFactory;

    protected $table = 'tabGroups';

    protected $fillable = [
        'windowId',
        'name',
        'description'
    ];

    protected $appends = [
        'tabs'
    ];

    protected $hidden = [
        'windowId',
        'created_at',
        'updated_at'
    ];

    public function getTabsAttribute()
    {
        return Tab::all()->where('tabGroupId', '=', $this->id)->except(['id']);
    }
}
