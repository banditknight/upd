<?php

namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface;
use App\Models\v1\User;
use App\Traits\User as UserTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AuthModelBelongToVendorCriteria implements CriteriaInterface
{
    use UserTrait;

    public function apply($model, RepositoryInterface $repository)
    {
        $user = $this->getUser();

        if ($user && !$user->hasRole('vendor')) {
            return $model;
        }

        $modelFillAble = $model instanceof Model ? $model->getFillAble() : $model->getModel()->getFillAble();

        /**
         * @var User $user
         * @var Model $model
         */
        if ($user && in_array('vendorId', $modelFillAble, false) && !request()->has('vendorId')) {
            /** @var Builder $model */
            $model = $model->where('vendorId', '=', $user->vendorId);
        }

        return $model;
    }
}
