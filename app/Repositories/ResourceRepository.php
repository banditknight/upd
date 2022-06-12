<?php

namespace App\Repositories;

use App\Criteria\{AuthModelBelongToVendorCriteria, OnGoingTenderCriteria, RequestCriteria};
use App\Exceptions\Custom\Repository\RepositoryException;

class ResourceRepository extends AbstractRepository
{
    /**
     * @throws RepositoryException
     */
    public function boot(): void
    {
        parent::boot();

        $this->pushCriteria(AuthModelBelongToVendorCriteria::class);
        $this->pushCriteria(RequestCriteria::class);
        $this->pushCriteria(OnGoingTenderCriteria::class);
    }
}
