<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\UserManual
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\UserManualFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserManual whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserManual extends AbstractModel
{
    use HasFactory;

    protected $table = 'userManuals';

    protected $fillable = [
        'title',
        'content'
    ];
}
