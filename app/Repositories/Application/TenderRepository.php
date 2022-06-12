<?php

namespace App\Repositories\Application;

use App\Repositories\AbstractRepository;
use Carbon\Carbon;

class TenderRepository extends AbstractRepository
{
    public function findByFilter($filter)
    {
        if (!empty($filter['tenderId'])) {
            $tenderById = $this->findBy('id', $filter['tenderId']);

            return $tenderById ?: null;
        }

        if (!empty($filter['tenderTypeId'])) {
            $tenderByTypeId = $this->all()->where('tenderTypeId', '=', $filter['tenderTypeId']);

            return $tenderByTypeId ?: null;
        }

        if (!empty($filter['fromDate']) || !empty($filter['toDate'])) {
            $now = Carbon::now();

            $fromTimeStamp = Carbon::createFromFormat(
                'd-m-Y',
                !empty($filter['from']) ? $filter['from'] : $now->firstOfMonth()->format('d-m-Y')
            )->timestamp;

            $toTimeStamp = Carbon::createFromFormat(
                'd-m-Y',
                !empty($filter['to']) ? $filter['to'] : $now->addMonth(1)->lastOfMonth()->format('d-m-Y')
            )->timestamp;

            $tenderByFilterDate = $this->all()->where('fromDate', '>=', $fromTimeStamp)
                ->where('toDate', '<=', $toTimeStamp);

            return $tenderByFilterDate ?: null;
        }

        return null;
    }
}
