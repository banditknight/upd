<?php

namespace App\Http\Controllers\App\v1;

use App\Exceptions\Custom\ModelNotFoundException;
use App\Http\Requests\ResourceRequest;
use App\Models\v1\TenderProcessTechnical;
use Illuminate\Http\JsonResponse;

class TenderProcessTechnicalController extends ResourceController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     */
    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        $tenderProcessTechnical = TenderProcessTechnical::create(
            $resourceRequest->all()
        );

        return $this->responseSuccess([]);
    }

    /**
     * @throws ModelNotFoundException
     */
    public function destroy(int $id): JsonResponse
    {
        $tenderProcessTechnical = TenderProcessTechnical::find($id);

        if (!$tenderProcessTechnical) {
            throw new ModelNotFoundException();
        }

        $tenderProcessTechnical->isDeleted = 1;
        $tenderProcessTechnical->save();

        return $this->responseSuccess([]);
    }
}
