<?php

namespace App\Models\v1;

class WorkflowTransitionCondition extends AbstractModel
{
    protected $table = 'workflowtranstionconditions';

    protected $fillable = [
        'workflowTransitionId',
        'sequence',
        'seqJoinOperator',
        'columnName',
        'checkOperation',
        'checkValue',
    ];
}
