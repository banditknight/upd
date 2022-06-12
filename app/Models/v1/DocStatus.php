<?php

namespace App\Models\v1;

/**
 * App\Models\v1\DocStatus
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DocStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DocStatus extends AbstractModel
{
    protected $table = 'docStatuses';
}
