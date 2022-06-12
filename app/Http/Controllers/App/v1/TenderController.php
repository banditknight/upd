<?php

namespace App\Http\Controllers\App\v1;

use App\Http\Requests\v1\Tender\TenderIndexRequest;
use App\Repositories\Application\TenderRepository;
use Yajra\DataTables\CollectionDataTable;
use Yajra\DataTables\DataTables;

class TenderController extends AbstractController
{
    /** @var TenderRepository */
    protected $repo;

    /**
     * @throws \Exception
     */
    public function index(TenderIndexRequest $tenderIndexRequest)
    {
        if ($tenderIndexRequest->all()) {
            return $this->responseSuccess($this->repo->findByFilter($tenderIndexRequest->all()));
        }

        $tenders = $this->repo->all();

        /** @var CollectionDataTable $dataTableTenders */
        $dataTableTenders = null;
        try {
            $dataTableTenders = DataTables::of($tenders);
        } catch (\Exception $exception) {
            // @todo should be log
        }

        return $this->responseSuccess(
            $dataTableTenders instanceof CollectionDataTable ? $dataTableTenders->toArray() : null
        );
    }
}
