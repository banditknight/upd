<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\v1\AssessmentCriteriaItem
 *
 * @property int $id
 * @property int $assessmentCriteriaId
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property int|null $point
 * @property int|null $parent_id
 * @property int|null $isSummary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereAssessmentCriteriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereIsSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem wherePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $parentId
 * @property-read mixed $assessment_criteria
 * @property int|null $tenderId
 * @property int|null $tenderItemId
 * @method static \Database\Factories\v1\AssessmentCriteriaItemFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AssessmentCriteriaItem whereTenderItemId($value)
 */
class AssessmentCriteriaItem extends AbstractModel
{
    use HasFactory;

    protected $table = 'assessmentCriteriaItems';

    protected $fillable = [
        'assessmentCriteriaId',
        'code',
        'name',
        'description',
        'point',
        'parent',
        'isSummary'
    ];

    protected $hidden = [
        'assessmentCriteriaId',
        'tenderId',
        'tenderItemId',
        'created_at',
        'updated_at'
    ];

//    protected $appends = [
//        'assessmentCriteria'
//    ];
//
//    public function getAssessmentCriteriaAttribute()
//    {
//        return AssessmentCriteria::find($this->assessmentCriteriaId);
//    }
}
