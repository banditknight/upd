<?php

use Yuliusardian\LumenResourceRouting\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\v1\VerificationCode;

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

$router->options('/{any:.*}', function() {
    return response([
        'status' => [
            'code'    => 200,
            'message' => __('status.status_success')
        ],
    ]);
});

$router->get('servertime',function(){
    return time();
});

$router->post('mailverify',function(Request $request){

    $code = substr(str_shuffle("0123456789"), 0, 5);

    try {
        $rs = DB::table('emailVerification')->insert([
            'email' => $request->input('email'),
            'code' => $code
        ]);
            
        if($rs){
            Mail::to($request->input('email'))->send(new VerificationCode($code,"Email Verification Code"));

            $encodedMessage = json_encode(['email'=>$request->input('email'),'code'=>$code], JSON_THROW_ON_ERROR);
            \App\Models\v1\Log::create([
                'userId' => 1,
                // 'vendorId' => $vendorId,
                'content' => $encodedMessage,
                'method' => 'POST',
                // 'oldValue' => $oldValue,
                // 'table' => $table,
                // 'recordID' => $rid,
                'token' => sha1($request->ip().$request->userAgent()),
                // 'newValue' => $encodedMessage,
                'ipAddress' => $request->ip(),
                'action' => 5
            ]);
    
        }

    } catch (\Throwable $th) {
        // return response([
        //     'status' => [
        //         'code' => 500,
        //         'message' => $th->getMessage()
        //     ]
        //     ],500);
    }

    return response([
        'status' => [
            'code'    => 200,
            'message' => __('status.status_success')
        ],
    ]);
});

$router->post('codeverify',function(Request $request){

    $rs = DB::table('emailVerification')
        ->where('email', $request->input('email'))
        ->where('code', $request->input('code'))
        ->first();    

    if(!$rs){
        return response([
            'status' => [
                'code'    => 404,
                'message' => 'Verification failed'
            ],
        ],404);
    }

    // return $rs->email;
    return response([
        'status' => [
            'code'    => 200,
            'message' => __('status.status_success')
        ],
    ]);
});


$router->group([
    'prefix' => 'account',
], static function () use ($router) {
    $router->post('login', 'AccountController@login');
    $router->post('forgot-password', 'AccountController@forgotPassword');
    $router->get('reset-password/{token}', 'AccountController@resetPasswordVerify');
    $router->post('reset-password', 'AccountController@resetPassword');

    // Route has been disabled since we only register vendor and PIC as user.
    // $router->post('register', 'AccountController@register');

    $router->group(['prefix' => 'vendor'],  static function () use ($router) {
        $router->post('register', 'VendorController@register');
    });
});

$router->resource('company/type', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\CompanyType::class);

$router->group([
    'prefix' => 'vendor'
], static function () use ($router) {

    $router->group([
        'middleware' => ['auth']
    ], static function() use ($router) {
        $router->get('profile', 'VendorController@profile');

        $router->post('verification', 'VendorController@verification');

        $router->get('/', 'VendorController@index');

        $router->resource('branch', 'ResourceController', [
            'only' => ['index', 'store', 'update', 'destroy', 'show'],
            'middleware' => ['auth'],
        ])->model(\App\Models\v1\Branch::class)->parameters(['branch' => 'id']);

        $router->resource('data', 'ResourceController', [
            'only' => ['index', 'show', 'update'],
        ])->model(\App\Models\v1\Vendor::class)->parameters(['data' => 'id']);
    });

});

$router->resource('vendor/type/information', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\VendorTypeInformation::class)->parameters(['information' => 'id']);

$router->resource('reference', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\Reference::class)->parameters(['reference' => 'id']);

$router->resource('country', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\Country::class)->parameters(['country' => 'id']);

$router->resource('city', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\City::class)->parameters(['city' => 'id']);

$router->resource('province', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\Province::class)->parameters(['province' => 'id']);

$router->resource('district', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\District::class)->parameters(['district' => 'id']);

$router->resource('domain', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\Domain::class)->parameters(['domain' => 'id']);

$router->resource('user/manual', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\UserManual::class)->parameters(['manual' => 'id']);

$router->resource('term-and-condition', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\TermAndCondition::class)->parameters(['term-and-condition' => 'id']);

$router->resource('business/type', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\BusinessType::class)->parameters(['type' => 'id']);

$router->resource('sub-business/type', 'ResourceController', [
    'only' => ['index', 'show'],
])->model(\App\Models\v1\SubBusinessType::class)->parameters(['type' => 'id']);

$router->resource('asset', 'AssetController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
])->model(\App\Models\v1\Asset::class)->parameters(['asset' => 'id']);

$router->resource('bank/account', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\BankAccount::class)->parameters(['account' => 'id']);

$router->resource('bank', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth']
])->model(\App\Models\v1\Bank::class)->parameters(['bank' => 'id']);

$router->resource('currency', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth']
])->model(\App\Models\v1\Currency::class)->parameters(['currency' => 'id']);

$router->resource('financial/statement', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\FinancialStatement::class)->parameters(['statement' => 'id']);

$router->resource('tax/document/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TaxDocumentType::class)->parameters(['type' => 'id']);

$router->resource('tax/document', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TaxDocument::class)->parameters(['document' => 'id']);

$router->resource('deed/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\DeedType::class)->parameters(['type' => 'id']);

$router->resource('deed', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Deed::class)->parameters(['deed' => 'id']);

$router->resource('nationality', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Nationality::class)->parameters(['nationality' => 'id']);

$router->resource('shareholder', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\ShareHolder::class)->parameters(['shareholder' => 'id']);

$router->resource('board/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\BoardType::class)->parameters(['type' => 'id']);

$router->resource('board', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Board::class)->parameters(['board' => 'id']);

$router->resource('pic', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth', 'delete.account', 'update.account', 'create.account'],
])->model(\App\Models\v1\User::class)->parameters(['pic' => 'id']);

$router->resource('tool/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\ToolType::class)->parameters(['type' => 'id']);

$router->resource('tool/owner/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\ToolOwnerType::class)->parameters(['type' => 'id']);

$router->resource('tool', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Tool::class)->parameters(['tool' => 'id']);

$router->resource('employee/status', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\EmployeeStatus::class)->parameters(['status' => 'id']);

$router->resource('employee', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Employee::class)->parameters(['employee' => 'id']);

$router->resource('education', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Education::class)->parameters(['education' => 'id']);

$router->resource('field-of-study', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\FieldOfStudy::class)->parameters(['field-of-study' => 'id']);

$router->resource('work-period', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\WorkPeriod::class)->parameters(['work-period' => 'id']);

$router->resource('certification/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\CertificationType::class)->parameters(['type' => 'id']);

$router->resource('certification', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Certification::class)->parameters(['certification' => 'id']);

$router->resource('competency', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Competency::class)->parameters(['competency' => 'id']);

$router->resource('financial/report', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\FinancialReport::class)->parameters(['report' => 'id']);

$router->resource('expired-document', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\ExpiredDocument::class)->parameters(['expired-document' => 'id']);

$router->resource('sanction', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Sanction::class)->parameters(['sanction' => 'id']);

$router->resource('window', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Window::class)->parameters(['window' => 'id']);

$router->resource('business/permit/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\BusinessPermitType::class)->parameters(['type' => 'id']);

$router->resource('business/permit', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\BusinessPermit::class)->parameters(['permit' => 'id']);

$router->resource('menu', 'ResourceController', [
    'only' => ['index'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Menu::class)
    ->repository(\App\Repositories\Application\MenuRepository::class)
    ->parameters(['menu' => 'id']);

$router->resource('experience', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\Experience::class)->parameters(['experience' => 'id']);

$router->resource('announcement/general', 'ResourceController', [
    'only' => ['index'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\AnnouncementGeneral::class)->parameters(['general' => 'id']);

$router->resource('announcement/vendor', 'ResourceController', [
    'only' => ['index'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\AnnouncementVendor::class)->parameters(['vendor' => 'id']);

$router->resource('tender/process/technical/offering', 'ResourceController', [
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderProcessTechnicalOffering::class);

$router->resource('tender/process/commercial/offering', 'ResourceController', [
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderProcessCommercialOffering::class);

$router->resource('tender/item/component/comply', 'ResourceController', [
    'only' => ['index', 'store', 'show'],
    'middleware' => ['auth', 'tender.item.component.comply'],
])->model(\App\Models\v1\TenderItemComponentComply::class)->parameters(['comply' => 'id']);

$router->resource('tender/item/comply', 'ResourceController', [
    'only' => ['index', 'store', 'update', 'destroy', 'show'],
    'middleware' => ['auth', 'tender.item.comply'],
])->model(\App\Models\v1\TenderItemComply::class)->parameters(['comply' => 'id']);

$router->resource('tender/process/pra-qualification', 'TenderProcessPraQualificationController', [
    'only' => ['index', 'store', 'destroy'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderRequirementDocument::class)->requestCriteria([
    App\Criteria\TenderProcessPraQualificationCriteria::class,
])->parameters(['pra-qualification' => 'id']);

$router->resource('tender/process/technical', 'TenderProcessTechnicalController', [
    'only' => ['index', 'store', 'destroy'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderRequirementDocument::class)->requestCriteria([
    App\Criteria\TenderProcessTechnicalCriteria::class,
])->parameters(['technical' => 'id']);

$router->resource('tender/process/commercial', 'TenderProcessCommercialController', [
    'only' => ['index', 'store', 'destroy'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderRequirementDocument::class)->requestCriteria([
    App\Criteria\TenderProcessCommercial::class
])->parameters(['commercial' => 'id']);

$router->resource('tender/incoterm', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderIncoterm::class)->parameters(['incoterm' => 'id']);

$router->resource('tender/join', 'ResourceController', [
    'only' => ['index', 'store', 'show'],
    'middleware' => ['auth', 'join.tender'],
])->model(\App\Models\v1\TenderParticipant::class)->parameters(['join' => 'id']);

$router->resource('tender/requirement-document', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderRequirementDocument::class)->parameters(['requirement-document' => 'id']);

$router->resource('tender/item', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderItem::class)->parameters(['item' => 'id']);

$router->resource('tender/schedule', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderSchedule::class)->parameters(['schedule' => 'id']);

$router->resource('tender/aanwijzing', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderAanwijzing::class)->parameters(['aanwijzing' => 'id']);

$router->resource('tender/negotiation', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderNegotiation::class)->parameters(['negotiation' => 'id']);

$router->resource('tender/participant', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderParticipant::class)->parameters(['participant' => 'id']);

$router->resource('tender/tbe', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderTechnicalBidEvaluation::class)->parameters(['tbe' => 'id']);

$router->resource('tender/cbe', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderCommercialBidEvaluation::class)->parameters(['cbe' => 'id']);

$router->resource('tender/document', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderDocument::class)->parameters(['document' => 'id']);

$router->resource('tender/type', 'ResourceController', [
    'only' => ['index', 'show'],
    'middleware' => ['auth'],
])->model(\App\Models\v1\TenderType::class)->parameters(['type' => 'id']);

$router->resource('tender', 'TenderVendorController', [
    'only' => ['index', 'show'],
    //'middleware' => ['auth'],
])->model(\App\Models\v1\Tender::class)->parameters(['tender' => 'id']);

$router->resource('notification', 'ResourceController', [
    'only' => ['index', 'update', 'show'],
    'middleware' => ['notification']
])->model(\App\Models\v1\Notification::class)->parameters(['notification' => 'id']);
