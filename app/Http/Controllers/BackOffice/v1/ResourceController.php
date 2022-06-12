<?php

namespace App\Http\Controllers\BackOffice\v1;

use App\Exceptions\Custom\Repository\RepositoryException;
use App\Http\Requests\ResourceRequest;
use App\Repositories\ResourceRepository;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpFoundation\Response;

class ResourceController extends AbstractController
{
    /** @var ResourceRepository */
    public $repo;

    /**
     * Display a listing of the resource.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function index(ResourceRequest $resourceRequest): JsonResponse
    {
        $index = $this->repo->paginate($resourceRequest->get('limit', 0));

        return $this->responseSuccess($index);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     */
    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        $store = [];
        try {
            $store = $this->repo->create($resourceRequest->all());
        } catch (RepositoryException | ValidatorException $e) {

        }

        return $this->responseSuccess($store, Response::HTTP_OK, __('status.status_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function show(int $id): JsonResponse
    {
        $show = $this->repo->find($id);

        return $this->responseSuccess($show);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ResourceRequest $resourceRequest
     * @param int $id
     * @return JsonResponse
     */
    public function update(ResourceRequest $resourceRequest, int $id): JsonResponse
    {
        $update = [];
        try {
            $update = $this->repo->update($resourceRequest->all(), $id);
        } catch (RepositoryException | ValidatorException $e) {

        }

        return $this->responseSuccess($update, Response::HTTP_OK, __('status.status_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws RepositoryException
     */
    public function destroy(int $id): JsonResponse
    {
        $destroy = $this->repo->delete($id);

        return $this->responseSuccess([], Response::HTTP_OK, __('status.status_deleted'));
    }
}
