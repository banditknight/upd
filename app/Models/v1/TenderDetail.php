<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TenderDetail
 *
 * @property int $id
 * @property int $tenderId
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\TenderDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TenderDetail extends AbstractModel
{
    use HasFactory;

    protected $table = 'tenderDetails';

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
