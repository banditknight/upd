<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TenderType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\TenderTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderType extends AbstractModel
{
    use HasFactory;

    protected $table = 'tenderTypes';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
