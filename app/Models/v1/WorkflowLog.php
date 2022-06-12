<?php

namespace App\Models\v1;

/**
 * App\Models\v1\WorkflowLog
 *
 * @property int $id
 * @property int $userId
 * @property int $vendorId
 * @property string $model
 * @property int $mid
 * @property string $transition
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereMid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereTransition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkflowLog whereVendorId($value)
 * @mixin \Eloquent
 */
class WorkflowLog extends AbstractModel
{
    protected $table = 'workflowLogs';

    protected $fillable = [
        'userId',
        'vendorId',
        'model',
        'mid',
        'transition',
        'updated_at',
        'created_at',
    ];
}
