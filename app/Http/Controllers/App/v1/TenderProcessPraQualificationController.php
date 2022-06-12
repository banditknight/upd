<?php

namespace App\Http\Controllers\App\v1;

use App\Exceptions\Custom\ModelNotFoundException;
use App\Exceptions\Custom\Repository\RepositoryException;
use App\Http\Requests\ResourceRequest;
use App\Models\v1\TenderProcessDocumentPraQualification;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Exceptions\ValidatorException;

class TenderProcessPraQualificationController extends ResourceController
{
    /**
     * Display a listing of the resource.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function index(ResourceRequest $resourceRequest): JsonResponse
    {
        return $this->responseSuccess($this->repo->paginate($resourceRequest->get('limit', 0)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     */
    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        $tenderProcessDocumentPraQualification = TenderProcessDocumentPraQualification::create(
            $resourceRequest->all()
        );

        return $this->responseSuccess($tenderProcessDocumentPraQualification);
    }

    /**
     * @throws ModelNotFoundException
     */
    public function destroy(int $id): JsonResponse
    {
        $tenderProcessDocumentPraQualification = TenderProcessDocumentPraQualification::find($id);

        if (!$tenderProcessDocumentPraQualification) {
            throw new ModelNotFoundException('');
        }

        $tenderProcessDocumentPraQualification->isDeleted = 1;
        $tenderProcessDocumentPraQualification->save();

        return $this->responseSuccess([]);
    }
}
