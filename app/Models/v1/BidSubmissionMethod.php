<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\BidSubmissionMethod
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\BidSubmissionMethodFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BidSubmissionMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BidSubmissionMethod extends AbstractModel
{
    use HasFactory;

    protected $table = 'bidSubmissionMethods';

    protected $fillable = [
        'code',
        'name'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];
}
