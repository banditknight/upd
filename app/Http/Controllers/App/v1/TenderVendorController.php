<?php

namespace App\Http\Controllers\App\v1;

use App\Http\Requests\ResourceRequest;
use App\Repositories\ResourceRepository;
use App\Criteria\TenderOpenedCriteria;
use App\Criteria\OnGoingTenderCriteria;
use Illuminate\Http\JsonResponse;

class TenderVendorController extends AbstractController
{
    public $repo;

    public function index(ResourceRequest $resourceRequest): JsonResponse
    {
        $index = $this->repo->pushCriteria(new TenderOpenedCriteria())->paginate($resourceRequest->get('limit', 0));
        // $index = $this->repo->pushCriteria(new TenderOpenedCriteria())
        //     ->pushCriteria(new OnGoingTenderCriteria())
        //     ->orderBy('id','desc')->all();

        return $this->responseSuccess($index);
    }

    public function show(int $id): JsonResponse
    {
        $show = $this->repo->find($id);

        return $this->responseSuccess($show);
    }

}
