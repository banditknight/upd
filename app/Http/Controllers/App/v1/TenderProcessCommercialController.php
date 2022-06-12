<?php

namespace App\Http\Controllers\App\v1;

use App\Exceptions\Custom\ModelNotFoundException;
use App\Http\Requests\ResourceRequest;
use App\Models\v1\TenderProcessCommercial;
use Illuminate\Http\JsonResponse;

class TenderProcessCommercialController extends ResourceController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     */
    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        $tenderProcessTechnical = TenderProcessCommercial::create(
            $resourceRequest->all()
        );

        return $this->responseSuccess([]);
    }

    /**
     * @throws ModelNotFoundException
     */
    public function destroy(int $id): JsonResponse
    {
        $tenderProcessCommercial = TenderProcessCommercial::find($id);

        if (!$tenderProcessCommercial) {
            throw new ModelNotFoundException();
        }

        $tenderProcessCommercial->isDeleted = 1;
        $tenderProcessCommercial->save();

        return $this->responseSuccess([]);
    }
}
