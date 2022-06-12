<?php

namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface;
use App\Models\v1\Tender;
use App\Traits\User as UserTrait;

class OnGoingTenderCriteria implements CriteriaInterface
{
    use UserTrait;

    protected $request;

    public function __construct()
    {
        $this->request = request();
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (!$model instanceof Tender) {
            return $model;
        }

        $user = $this->getUser();

        if ($this->request->get('isJoined', false)) {
            return $model
                ->where('tenderParticipants.vendorId', $user->vendorId)
                ->where('docStatusId',2)
                ->join('tenderParticipants', 'tenders.id', '=', 'tenderParticipants.tenderId');
        }

        return $model;
    }
}
