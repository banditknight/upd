<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Mail;
use App\Mail\v1\VerificationCode;

$router->get('/', function () use ($router) {
    return 'It\'s working !';
});

$router->get('/test', 'TestController@index');

$router->get('/file/pdf', 'FileController@pdf');
$router->get('/file/xlsx', 'FileController@xlsx');
$router->get('/file/assets', 'FileController@files');

$router->get('migrate', function(){
    Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
    return 'ok';
});

$router->get('mailcheck', function(){
    Mail::to('andre@sentralnusa.com')->send(new VerificationCode('666',"Email Verification Code"));
    return 'ok';
});

$router->get('mailpreview',function(){
    return (new VerificationCode('123456','Email Verification Code'))->render();
});