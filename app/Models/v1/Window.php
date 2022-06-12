<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\Window
 *
 * @property int $id
 * @property int $organizationId
 * @property string $name
 * @property string $description
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $tab_groups
 * @property-read mixed $tabs
 * @method static \Database\Factories\v1\WindowFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Window newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Window newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Window query()
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereOrganizationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Window whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Window extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'organizationId',
        'name',
        'description',
        'title',
    ];

    protected $appends = [
        'tabGroups',
        'tabs'
    ];

    public function getTabGroupsAttribute()
    {
        return TabGroup::all()->where('windowId', '=', $this->id);
    }

    public function getTabsAttribute()
    {
        return Tab::all()->where('windowId', '=', $this->id);
    }
}
