<?php

namespace App\Http\Controllers\BackOffice\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\v1\PurchaseRequestItem;

class PRSyncController extends Controller
{
    public function sync(){
        // $lastpritem = PurchaseRequestItem::select('PRItemId')->get()->last();
        // $pr = DB::connection('avantis')->select("select * from kpi_eproc where PRItemId > ".$lastpritem);
        $pr = DB::connection('avantis')->select("select * from kpi_eproc where PRItemId > 30000")->get();

        return $pr;
    }
}
