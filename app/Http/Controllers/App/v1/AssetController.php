<?php

namespace App\Http\Controllers\App\v1;

use App\Exceptions\Custom\Repository\RepositoryException;
use App\Http\Requests\ResourceRequest;
use App\Traits\Asset;
use Illuminate\Http\JsonResponse;
use Prettus\Validator\Exceptions\ValidatorException;

class AssetController extends ResourceController
{
    use Asset;

    /**
     * Store a newly created resource in storage.
     *
     * @param ResourceRequest $resourceRequest
     * @return JsonResponse
     */
    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        $auth = auth();
        $store = [];
        $par = $resourceRequest->all();
        if ($user = $auth->user()) {
            $par['userId'] = $user->id;
            $par['vendorId'] = $user->vendorId;
        }
        $par['mimeType'] = $resourceRequest->file('attachment')->getMimeType();

        try {
            $store = $this->repo->create($par);

            $store->update([
                'attachment' => $this->move($resourceRequest->file('attachment'))
            ]);

        } catch (RepositoryException | ValidatorException $e) {

        }

        return $this->responseSuccess($store);
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

        return $this->responseSuccess($update);
    }
}
