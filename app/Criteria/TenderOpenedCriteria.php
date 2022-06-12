<?php
namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface as Repository;

class TenderOpenedCriteria implements CriteriaInterface {
    public function apply($model, Repository $repository){
        $query = $model->whereIn('docStatusId',[2,3,4]);
        return $query;
    }
}