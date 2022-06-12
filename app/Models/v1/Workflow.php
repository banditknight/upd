<?php

namespace App\Models\v1;

class Workflow extends AbstractModel
{
    protected $table = 'workflows';

    protected $fillable = [
        'code',
        'name',
        'description',
        'modelName',
        'startNodeId',
        'isActive',
    ];

    protected $appends = [
        // 'nodes',
        'steps',
        'startNode'
    ];

    // public function getNodesAttribute(){
    //     return $this->hasMany(WorkflowNode::class,'workflowId')->get();
    // }

    public function getStartNodeAttribute(){
        return WorkflowNode::find($this->startNodeId);
    }
    
    private function getNode($node){
        $list = [];
        if($node->transition){
            $n = [];
            foreach ($node->transition as $value) {
                $n[] = [
                    'key' => $value->nextNode->id,
                    'data'=> [
                        'label'=>$value->nextNode->name,
                        'description'=>$value->nextNode->description
                    ],
                    'children' => $this->getNode($value->nextNode),
                ];
            }
            $list[] = $n;
        }
        return $list[0];
    }

    public function getStepsAttribute(){
        $step = [];

        if(!$this->startNode){
            return null;
        }

        $step = [
            'key' => $this->startNode->id,
            'data'=> [
                'label'=>$this->startNode->name,
                'description'=>$this->startNode->description
            ],
            'children' => $this->getNode($this->startNode),
        ];
        return $step;
    }
}
