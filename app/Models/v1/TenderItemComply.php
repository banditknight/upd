<?php

namespace App\Models\v1;

/**
 * App\Models\v1\TenderItemComply
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property int $tenderId
 * @property int $tenderItemId
 * @property int $isComply
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply query()
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereIsComply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereTenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereTenderItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TenderItemComply whereVendorId($value)
 * @mixin \Eloquent
 */
class TenderItemComply extends AbstractModel
{
    protected $table = 'tenderItemComplies';

    protected $fillable = [
        'userId',
        'vendorId',
        'tenderId',
        'tenderItemId',
        'isComply',
        'isTbe',
        'isCbe',
        'unitPrice',
        'additionalCost',
        'additionalCostDescription',
        'comment'
    ];

    protected $hidden = [
        'userId',
        'vendorId',
        'tenderId',
        'tenderItemId',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'isComply' => 'boolean'
    ];
}
