<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderCommercialBidEvaluation
 *
 * @property int $id
 * @property int $tenderId
 * @property string $criteriaCode
 * @property string $criteriaName
 * @property string $requirement
 * @property string $weight
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereCriteriaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereCriteriaName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderCommercialBidEvaluation whereWeight($value)
 * @mixin \Eloquent
 */
class TenderCommercialBidEvaluation extends AbstractModel
{
    protected $table = 'tenderCommercialBidEvaluations';

    protected $fillable = [
        'criteriaCode',
        'criteriaName',
        'requirement',
        'tenderId',
        'weight',
    ];
}
