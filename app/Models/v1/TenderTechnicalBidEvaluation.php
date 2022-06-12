<?php

namespace App\Models\v1;

use App\Traits\AssessmentCriteriaItemTrait;

/**
 * App\Models\v1\TenderTechnicalBidEvaluation
 *
 * @property int $id
 * @property int $tenderId
 * @property string $criteriaCode
 * @property string $criteriaName
 * @property string $requirement
 * @property string $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereCriteriaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereCriteriaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereWeight($value)
 * @mixin \Eloquent
 * @property int $tenderItemId
 * @property int $assessmentCriteriaId
 * @property-read mixed $assessment_criteria
 * @property mixed $assessment_criteria_item
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereAssessmentCriteriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderTechnicalBidEvaluation whereTenderItemId($value)
 */
class TenderTechnicalBidEvaluation extends AbstractModel
{
    use AssessmentCriteriaItemTrait;

    protected $table = 'tenderTechnicalBidEvaluations';

    protected $fillable = [
        'tenderId',
        'tenderItemId',
        'assessmentCriteriaId',
        'assessmentCriteriaItem',
        'requirement',
        'weight'
    ];

    protected $hidden = [
        'assessmentCriteriaId',
        'tenderId',
        'tenderItemId',
        'created_at',
        'updated_at'
    ];

    protected $appends = [
        'assessmentCriteria',
    ];

    public function getAssessmentCriteriaAttribute()
    {
        return AssessmentCriteria::query()
            ->where('tenderItemId', '=', $this->tenderItemId)
            ->where('tenderId', '=', $this->tenderId)
            ->get(['id', 'code', 'name']);
    }

    public function setAssessmentCriteriaItemAttribute($value)
    {
        $this->submitItem($value, $this->tenderId, $this->tenderItemId, $this->assessmentCriteriaId);
    }

    public function getAssessmentCriteriaItemAttribute()
    {
        //
    }
}
