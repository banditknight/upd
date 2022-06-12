<?php

namespace App\Models\v1;

/**
 * App\Models\v1\SpatieRoleHasPermission
 *
 * @property int $permission_id
 * @property int $role_id
 * @property-read mixed $permission
 * @property-read mixed $role
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRoleHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRoleHasPermission wherePermissionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatieRoleHasPermission whereRoleId($value)
 * @mixin \Eloquent
 */
class SpatieRoleHasPermission extends AbstractModel
{
    protected $table = 'spatieRoleHasPermissions';

    protected $hidden = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'permission',
        'role'
    ];

    public function getPermissionAttribute()
    {
        return SpatiePermission::find($this->permission_id)->only(['id', 'name']);
    }

    public function getRoleAttribute()
    {
        return SpatieRole::find($this->role_id)->only(['id', 'name']);
    }
}
