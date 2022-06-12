<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderItemComponentComply
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $tenderId
 * @property int $tenderItemId
 * @property int|null $tenderItemComponentId
 * @property int|null $assessmentCriteriaItemId
 * @property int $score
 * @property int $isComply
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereAssessmentCriteriaItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereIsComply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereTenderItemComponentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereTenderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComponentComply whereVendorId($value)
 * @mixin \Eloquent
 */
class TenderItemComponentComply extends AbstractModel
{
    protected $table = 'tenderItemComponentComplies';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'tenderItemId',
        'tenderItemComponentId',
        'assessmentCriteriaItemId',
        'score',
        'isComply',
        'comment',
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'created_at',
        'updated_at'
    ];
}
