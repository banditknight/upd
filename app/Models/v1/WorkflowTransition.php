<?php

namespace App\Models\v1;

class WorkflowTransition extends AbstractModel
{
    protected $table = 'workflowTransitions';

    protected $fillable = [
        'workflowNodeId',
        'workflowNextNodeId',
        'sequence',
        'description',
    ];

    protected $appends = [
        'nextNode'
    ];

    public function getNextNodeAttribute()
    {
        return WorkflowNode::find($this->workflowNextNodeId);
    }
}
