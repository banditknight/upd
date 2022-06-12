<?php

namespace App\Http\Controllers\BackOffice\v1;

use App\Http\Requests\v1\TenderPurchaseRequest\StoreRequest;
use App\Traits\TenderPurchaseRequestTrait;
use Illuminate\Http\JsonResponse;

class TenderPurchaseRequestController extends AbstractController
{
    use TenderPurchaseRequestTrait;

    public function store(StoreRequest $storeRequest): JsonResponse
    {
        $data = $this->purchaseRequestToTender($storeRequest->all());

        return $this->responseSuccess($data);
    }
}
