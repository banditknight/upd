<?php

namespace App\Http\Controllers\BackOffice\v1;

use App\Http\Requests\ResourceRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;

class PurchaseRequestSyncController extends ResourceController
{
    /**
     * @throws \JsonException
     */
    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        Artisan::call('pr:sync');
        $output = Artisan::output();

        $data['data'] = is_string($output) ?
            json_decode($output, true, 512, JSON_THROW_ON_ERROR) : [];

        return $this->responseSuccess(
            $data
        );
    }
}
