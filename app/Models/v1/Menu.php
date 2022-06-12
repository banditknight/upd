<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\v1\Menu
 *
 * @property int $id
 * @property string $value
 * @property string $name
 * @property string $description
 * @property int $isParent
 * @property int|null $parentId
 * @property int $menuActionId
 * @property int $menuActionValue
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $child
 * @property-read mixed $menu_action
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\v1\MenuFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereIsParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenuActionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereMenuActionValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereValue($value)
 * @mixin \Eloquent
 */
class Menu extends AbstractModel
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'value',
        'name',
        'description',
        'isParent',
        'parentId',
        'menuActionId',
        'menuActionValue',
        'isActive',
        'sequence',
        'icon',
    ];

    protected $casts = [
        'isActive' => 'boolean',
        'isParent' => 'boolean',
    ];

    protected $appends = [
        'child',
        'menuAction',
        // 'roleAccess',
    ];

    protected $hidden = [
        'menuActionId',
        // 'menuActionValue',
        'created_at',
        'updated_at'
    ];

    public function getMenuActionAttribute()
    {
        // $act = MenuAction::find($this->menuActionId, ['code', 'name']);
        // return $this->getChildAttribute()->all() ? null : array_merge(
        //     $act ? $act->toArray() : [],
        //     ['value' => $this->menuActionValue]
        // );
        return MenuAction::find($this->menuActionId, ['id', 'code', 'name']);
    }

    public function getChildAttribute()
    {
        return Menu::all()->where('parentId', '=', $this->id)->sortBy(['sequence'])->except(['id']);
    }

    // public function getRoleAccessAttribute(){
    //     return $this->belongsToMany(SpatieRole::class,'roleMenus','menuId','roleId')->get();
    // }

}
