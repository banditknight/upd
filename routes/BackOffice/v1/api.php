<?php

use Yuliusardian\LumenResourceRouting\Routing\Router;
use Illuminate\Support\Facades\DB;

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->options('/{any:.*}', function () {
    return response([
        'status' => [
            'code'    => 200,
            'message' => __('status.status_success')
        ],
    ]);
});

$router->resource('bank', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Bank::class)->parameters(['bank' => 'id']);

$router->resource('currency', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Currency::class)->parameters(['currency' => 'id']);

$router->resource('business/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\BusinessType::class)->parameters(['type' => 'id']);

$router->resource('sub-business/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\SubBusinessType::class)->parameters(['type' => 'id']);

$router->resource('company/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\CompanyType::class)->parameters(['type' => 'id']);

$router->resource('request/quotation', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\RequestForQuotation::class)->parameters(['quotation' => 'id']);

$router->resource('rfq/item', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\RequestForQuotationItem::class)->parameters(['item' => 'id']);

$router->resource('rfq/vendor', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\RequestForQuotationVendor::class)->parameters(['vendor' => 'id']);

$router->resource('purchase/request/synchronization', 'PurchaseRequestSyncController', [
    'only' => ['index', 'store', 'show'],
])->model(\App\Models\v1\PurchaseRequest::class)->parameters(['synchronization' => 'id']);

$router->resource('purchase/request', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\PurchaseRequest::class)->parameters(['request' => 'id']);

$router->resource('purchaserequest/item', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\PurchaseRequestItem::class)->parameters(['item' => 'id']);

$router->resource('tender/item/component', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderItemComponent::class)->parameters(['component' => 'id']);

$router->get('/tender/activity', 'TenderActivityController@index');

$router->get('/workflowprocess', 'WorkflowController@status');
// $router->post('/workflow', 'WorkflowController@store');
$router->resource('workflow', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Workflow::class)->parameters(['workflow' => 'id']);

$router->resource('workflownode', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\WorkflowNode::class)->parameters(['workflownode' => 'id']);

$router->resource('workflowtransition', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\WorkflowTransition::class)->parameters(['workflowtransition' => 'id']);

$router->resource('workflowcondition', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\WorkflowTransitionCondition::class)->parameters(['workflowcondition' => 'id']);

$router->resource('tender/item', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderItem::class)->parameters(['item' => 'id']);

$router->resource('tender/requirement-document', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderRequirementDocument::class)->parameters(['requirement-document' => 'id']);

$router->resource('tender/schedule', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderSchedule::class)->parameters(['schedule' => 'id']);

$router->resource('tender/aanwijzing', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderAanwijzing::class)->parameters(['aanwijzing' => 'id']);

$router->resource('tender/negotiation', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderNegotiation::class)->parameters(['negotiation' => 'id']);

$router->resource('tender/participant', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'show'],
])->model(\App\Models\v1\TenderParticipant::class)->parameters(['participant' => 'id']);

$router->resource('tender/prequalification', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'show'],
])->model(\App\Models\v1\TenderProcessDocumentPraQualification::class)->parameters(['prequalification' => 'id']);

$router->resource('tender/technical', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'show'],
])->model(\App\Models\v1\TenderProcessTechnicalOffering::class)->parameters(['technical' => 'id']);

$router->resource('tender/tbe', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderTechnicalBidEvaluation::class)->parameters(['tbe' => 'id']);

$router->resource('tender/cbe', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderCommercialBidEvaluation::class)->parameters(['cbe' => 'id']);

$router->resource('tender/document', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderDocument::class)->parameters(['document' => 'id']);

$router->resource('tender/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderType::class)->parameters(['type' => 'id']);

$router->resource('tender/pr', 'TenderPurchaseRequestController', [
    'only' => ['store'],
])->model(\App\Models\v1\PurchaseRequest::class)->parameters(['pr' => 'id']);

$router->resource('tender', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Tender::class)->parameters(['tender' => 'id']);

$router->resource('vendor/group/classification', 'ResourceController', [
    'only' => ['index', 'show', 'update'],
])->model(\App\Models\v1\VendorGroupClassification::class)->parameters(['classification' => 'id']);

$router->resource('vendor/group/category', 'ResourceController', [
    'only' => ['index', 'show', 'update'],
])->model(\App\Models\v1\VendorGroupCategory::class)->parameters(['category' => 'id']);

$router->resource('vendor/group', 'ResourceController', [
    'only' => ['index', 'show', 'update'],
])->model(\App\Models\v1\VendorGroup::class)->parameters(['group' => 'id']);

$router->resource('vendor/data', 'ResourceController', [
    'only' => ['index', 'show', 'update'],
])->model(\App\Models\v1\Vendor::class)->parameters(['vendor' => 'id']);

$router->resource('log', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\Log::class)->parameters(['vendor' => 'id']);

$router->resource('deed/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\DeedType::class)->parameters(['type' => 'id']);

$router->resource('certification/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\CertificationType::class)->parameters(['type' => 'id']);

$router->resource('business/permit/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\BusinessPermitType::class)->parameters(['type' => 'id']);

$router->resource('board/type', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\BoardType::class)->parameters(['type' => 'id']);

// $router->resource('uom', 'ResourceController', [
//     'only' => ['index', 'store', 'update', 'destroy', 'show'],
// ])->model(\App\Models\v1\UnitOfMeasure::class)->parameters(['uom' => 'id']);

$router->resource('uom', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\UnitOfMeasure::class)->parameters(['uom' => 'id']);

$router->resource('bid-submission/method', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\BidSubmissionMethod::class)->parameters(['method' => 'id']);

$router->resource('asset', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\Asset::class)->parameters(['asset' => 'id']);

$router->resource('vendor', 'ResourceController', [
    'only' => ['index', 'update', 'show'],
    'middleware' => ['activation']
])->model(\App\Models\v1\Vendor::class)->parameters(['vendor' => 'id']);

$router->resource('assessment/criteria/item', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\AssessmentCriteriaItem::class)->parameters(['item' => 'id']);

$router->resource('assessment/criteria', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\AssessmentCriteria::class)->parameters(['criteria' => 'id']);

$router->resource('country', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Country::class)->parameters(['country' => 'id']);

$router->resource('province', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Province::class)->parameters(['province' => 'id']);

$router->resource('city', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\City::class)->parameters(['city' => 'id']);

$router->resource('domain', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Domain::class)->parameters(['domain' => 'id']);

$router->resource('scope-of-supply', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\ScopeOfSupply::class)->parameters(['scope-of-supply' => 'id']);

$router->resource('scope-of-work', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\ScopeOfWork::class)->parameters(['scope-of-work' => 'id']);

$router->resource('purchasing-group', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\PurchasingGroup::class)->parameters(['purchasing-group' => 'id']);

$router->resource('purchasing-organization', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\PurchasingOrganization::class)->parameters(['purchasing-organization' => 'id']);

$router->resource('sector', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Sector::class)->parameters(['sector' => 'id']);

$router->resource('product/code', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\ProductCode::class)->parameters(['code' => 'id']);

$router->resource('product/group/code', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\ProductGroupCode::class)->parameters(['code' => 'id']);

$router->resource('spatie/role', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['permission:editRole'],
])->model(\App\Models\v1\SpatieRole::class)->parameters(['role' => 'id']);

$router->resource('spatie/permission', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['permission:editPermission'],
])->model(\App\Models\v1\SpatiePermission::class)->parameters(['permission' => 'id']);

$router->resource('spatie/role-has-permission', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['permission:editRoleHasPermission'],
])->model(\App\Models\v1\SpatieRoleHasPermission::class)->parameters(['role-has-permission' => 'id']);

$router->resource('notification', 'ResourceController', [
    'only' => ['index', 'update', 'show'],
    'middleware' => ['notification']
])->model(\App\Models\v1\Notification::class)->parameters(['notification' => 'id']);

$router->resource('user', 'UserController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\User::class)->parameters(['user' => 'id']);

$router->resource('configs', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Config::class)->parameters(['configs' => 'id']);

$router->resource('incoterm', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\TenderIncoterm::class)->parameters(['incoterm' => 'id']);

$router->resource('dashboard', 'DashboardController', [
    'only' => ['index'],
]);

$router->resource('department', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Department::class)->parameters(['department' => 'id']);

$router->resource('jobTitle', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\JobTitle::class)->parameters(['jobTitle' => 'id']);

$router->resource('tender/vendors/invited', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    // 'middleware' => ['auth'],
])->model(\App\Models\v1\TenderInvitedVendor::class)->parameters(['invited' => 'id']);

$router->resource('tender/vendors/blocked', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    // 'middleware' => ['auth'],
])->model(\App\Models\v1\TenderBlockedVendor::class)->parameters(['blocked' => 'id']);

$router->resource('menu', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Menu::class)->parameters(['menu' => 'id']);

$router->resource('rolemenu', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\RoleMenu::class)->parameters(['rolemenu' => 'id']);

$router->get('/mainmenu/{id}', function ($id) {
    $role = \App\Models\v1\SpatieRole::find($id);
    $menus = [];
    foreach ($role->menus as $m) {
        if ($m->isParent)
            $menus[] = $m;
    }
    return $menus;
});

$router->group(['middleware' => ['auth']], static function () use ($router) {
    $router->get('/aanwijzingvendor', 'TenderProcessController@index');
    $router->get('/aanwijzingvendor/{id}', 'TenderProcessController@show');
    $router->put('/aanwijzingvendor/{id}', 'TenderProcessController@aanwijzingvendor');
    $router->put('/aanwijzingvendordestroy/{id}', 'TenderProcessController@aanwijzingvendordestroy');
});

$router->get('prsync', function(){
    $pr = DB::connection('avantis')->select("select * from kpi_eproc where PRNumber like '%3578%' order by PRNumber");
    $s = '';
    $prnumber = '';
    $prid = 0;

    DB::beginTransaction();

    try {

        DB::table('purchaseRequestItems')->where('id','>',22)->delete();
        DB::table('purchaseRequests')->where('id','>',30)->delete();

        foreach ($pr as $r) {
            if($prnumber != trim($r->PRNumber)){
                //insert PR Header

                $prnumber = trim($r->PRNumber);

                $prid = DB::table('purchaseRequests')->insertGetId([
                    'no' => $prnumber,
                    'name' => $r->PRDescription,
                    'departmentid' => 1,
                    'itemtypeid' => 1,
                    'currencyid' => 1,
                    'confirmeddate' => $r->ApprovedDate,
                    'totalamount' => $r->EstUnitCost,
                    'totalqty' => (int)$r->Qty,
                    'wono' => trim($r->WONumber),
                    'wotitle' => 'WO '.$r->WOTitel,
                    'document' => 'WO'. $r->UserPR,
                ]);

            }

            $dataSeederdetail[] = [
                'purchaseRequestId' => $prid,
                'pritemid' => $r->PRLineNumber,
                'catItemNo' => $r->ItemType,
                'materialNo' => $r->PRLineNumber,
                'description' => $r->ItemDescription,
                'qty' => (int)$r->Qty,
                'uom' => $r->UoM,
                'estimationUnitCost' => (int)$r->EstUnitCost,
                'remarks' => $r->UserPR,
                'isService' => false,
            ];

        }
        DB::table('purchaseRequestItems')->insert($dataSeederdetail);

        DB::commit();

    } catch (\Exception $e) {
        DB::rollback();
        $s = $e->getMessage();
    }
    // [catItemNo], [description], [estimationUnitCost], [isService], [materialNo], [purchaseRequestId], [qty], [remarks], [uom])
    return ['s'=>$s,'pr'=>$pr];
});