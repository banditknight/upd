<?php

namespace App\Models\v1;

class WorkflowNode extends AbstractModel
{
    protected $table = 'workflowNodes';

    protected $fillable = [
        'code',
        'name',
        'description',
        'columnName',
        'workflowId',
        'action',
        'comment',
    ];

    protected $appends = [
        'transition'
    ];

    public function getTransitionAttribute(){
        return $this->hasMany(WorkflowTransition::class,'workflowNodeId')->get();
    }

}
