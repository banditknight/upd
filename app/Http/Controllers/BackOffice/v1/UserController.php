<?php

namespace App\Http\Controllers\BackOffice\v1;

use Illuminate\Http\Request;
use App\Http\Requests\ResourceRequest;
use App\Exceptions\Custom\Repository\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\ResourceRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Models\v1\SpatieRole;
use App\Models\v1\User;

class UserController extends ResourceController
{
    public $repo;

    public function store(ResourceRequest $resourceRequest): JsonResponse
    {
        $store = [];
        try {
            $resourceRequest->merge(['code'=>'U'.sprintf('%05d',User::count()+1)]);
            $store = $this->repo->create($resourceRequest->all());
            $role = SpatieRole::find($resourceRequest->input('roleId'));
            $store->syncRoles($role->name);
        } catch (RepositoryException | ValidatorException $e) {

        }

        return $this->responseSuccess($store, Response::HTTP_OK, __('status.status_created'));
    }

    public function update(ResourceRequest $resourceRequest, int $id): JsonResponse
    {
        $update = [];
        try {
            // disable changing vendor.
            $update = $this->repo->update($resourceRequest->except('vendorId'), $id);
            $role = SpatieRole::find($resourceRequest->input('roleId'));
            $update->syncRoles($role->name);
        } catch (RepositoryException | ValidatorException $e) {

        }

        return $this->responseSuccess($update, Response::HTTP_OK, __('status.status_updated'));
    }    
}
