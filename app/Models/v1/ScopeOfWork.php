<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\ScopeOfWork
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $parent_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\ScopeOfWorkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork query()
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereParentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ScopeOfWork whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ScopeOfWork extends AbstractModel
{
    use HasFactory;

    protected $table = 'scopeOfWorks';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
