<?php

namespace App\Models\v1;

/**
 * App\Models\v1\SpatieRole
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRole whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SpatieRole extends AbstractModel
{
    protected $table = 'spatieRoles';

    protected $fillable = [
        // 'name',
        'code',
        'description',
        'guard_name'
    ];

    protected $appends = [
        'permission',
        'menus',
    ];

    public function getPermissionAttribute(){
        return SpatieRoleHasPermission::where('role_id',$this->id)->get();
    }

    public function getMenusAttribute(){
        $res = [];
        $menus = $this->belongsToMany(Menu::class,'roleMenus','roleId','menuId')->get();
        // foreach($menus as $menu){
        //     $res[] = $menu->only(['id','name']);
        // }
        return $menus;
    }
}