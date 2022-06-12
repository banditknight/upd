<?php

namespace App\Http\Requests;

use App\Contracts\FormRequestInterface;
use App\Traits\FormRequestDeciderTrait;
use App\Traits\UpdateModel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Pearl\RequestValidate\RequestAbstract;

abstract class AbstractRequest extends RequestAbstract implements FormRequestInterface
{
    use FormRequestDeciderTrait, UpdateModel;

    protected function validationData() : array
    {
        return $this->json() ? array_merge($this->json()->all(), $this->all()) : [];
    }

    protected function formatErrors(Validator $validator) : JsonResponse
    {
        return new JsonResponse([
            'status' => [
                'code' => 422,
                'message' => $validator->getMessageBag()->first()
            ],
            'data' => $validator->getMessageBag()
        ], 422);
    }
}
