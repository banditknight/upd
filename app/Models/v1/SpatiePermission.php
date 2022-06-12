<?php

namespace App\Models\v1;

/**
 * App\Models\v1\SpatiePermission
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SpatiePermission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SpatiePermission extends AbstractModel
{
    protected $table = 'spatiePermissions';
}
