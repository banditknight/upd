<?php

namespace App\Http\Controllers\BackOffice\v1;

use App\Exceptions\Custom\ModelNotFoundException;
use App\Http\Requests\AbstractRequest;
use App\Models\v1\WorkflowLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\v1\Workflow\{IndexRequest, StoreRequest};
use Symfony\Component\Workflow\StateMachine;

class WorkflowController extends AbstractController
{
    /**
     * @throws ModelNotFoundException
     */
    public function index(IndexRequest $indexRequest)
    {
        $findModelById = $this->modelResolver($indexRequest);
        $data = [];

        if (!$findModelById || !method_exists($findModelById, 'workflow_get')) {
            return $this->responseSuccess($data);
        }

        /** @var StateMachine $workflow */
        $workflow = $findModelById->workflow_get();
        $definition = $workflow->getDefinition();
        $currentPlace = $workflow->getMarking($findModelById)->getPlaces();
        $availablePlaces = $definition->getPlaces();

        $force = false;
        $step = 1;
        $currentStep = 1;
        foreach ($availablePlaces as $key => $availablePlace) {
            $isFinished = !isset($currentPlace[$key]);

            if (!$isFinished && !$force) {
                $currentStep = $step;
                $force = true;
            }

            $data['progress'][] = [
                'step' => $step,
                'name' => $key,
                'iconClass' => 'fa fa-user',
                'iconImage' => 'img.png',
                'isFinished' => $force ? false : $isFinished
            ];

            ++$step;
        }

        $allowedTransitions = [];
        foreach ($findModelById->workflow_transitions() as $workflow_transition) {
            $allowedTransitions[] = [
                'name' => $workflow_transition->getName(),
                'notes' => null
            ];
        }

        $data['currentStep'] = $currentStep;
        $data['allowedTransitions'] = $allowedTransitions;

        return $this->responseSuccess($data);
    }

    public function status(IndexRequest $request){
        $data = [];
        
        return $this->responseSuccess($data);
    }

    /**
     * @throws ModelNotFoundException
     */
    public function store(StoreRequest $storeRequest)
    {
        $findModelById = $this->modelResolver($storeRequest);
        $data = [];

        if (!$findModelById || !method_exists($findModelById, 'workflow_get')) {
            return $this->responseSuccess($data);
        }

        $transition = $storeRequest->get('transition');

        /** @var StateMachine $workflow */
        $workflow = $findModelById->workflow_get();

        $data['message'] = 'Updated';
        try {
            DB::beginTransaction();

            $workflow->apply($findModelById, $transition);

            WorkflowLog::insert([
                'userId' => 1,
                'vendorId' => 1,
                'model' => $storeRequest->get('model'),
                'mid' => $storeRequest->get('mid'),
                'transition' => $storeRequest->get('transition'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $findModelById->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            $data['message'] = $e->getMessage();
        }

        return $this->responseSuccess($data);
    }

    /**
     * @throws ModelNotFoundException
     */
    private function modelResolver(AbstractRequest $request)
    {
        $model = $request->get('model');
        $modelClass = sprintf('App\\Models\\v1\\%s', ucfirst($model));

        if (!class_exists($modelClass)) {
            throw new ModelNotFoundException();
        }

        $mid = $request->get('mid');

        return $modelClass::find($mid);
    }
}
