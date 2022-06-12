<?php

namespace App\Models\v1;

/**
 * App\Models\v1\AssessmentCriteria
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property int $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $item
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereWeight($value)
 * @mixin \Eloquent
 * @property int $tenderId
 * @property int $tenderItemId
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteria whereTenderItemId($value)
 */
class AssessmentCriteria extends AbstractModel
{
    protected $table = 'assessmentCriteria';

    protected $fillable = [
        'tenderId',
        'tenderItemId',
        'code',
        'name',
        'description',
        'weight'
    ];

    protected $appends = [
        'item'
    ];

    public function getItemAttribute($value)
    {
        return AssessmentCriteriaItem::query()
            ->where('assessmentCriteriaId', '=', $this->id)
//            ->where('tenderItemId', '=', $this->tenderItemId)
//            ->where('tenderId', '=', $this->tenderId)
            ->get();
    }
}
