<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\TermAndCondition
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\v1\TermAndConditionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TermAndCondition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TermAndCondition extends AbstractModel
{
    use HasFactory;

    protected $table = 'termAndConditions';

    protected $fillable = [
        'title',
        'content'
    ];
}
