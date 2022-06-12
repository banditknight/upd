<?php

require_once __DIR__.'/../vendor/autoload.php';

(new Laravel\Lumen\Bootstrap\LoadEnvironmentVariables(
    dirname(__DIR__)
))->bootstrap();

date_default_timezone_set(env('APP_TIMEZONE', 'UTC'));

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| Here we will load the environment and create the application instance
| that serves as the central piece of this framework. We'll use this
| application as an "IoC" container and router for this framework.
|
*/

$app = new Yuliusardian\LumenResourceRouting\Application(
    dirname(__DIR__)
);

$app->withFacades();

$app->withEloquent();

/*
|--------------------------------------------------------------------------
| Register Container Bindings
|--------------------------------------------------------------------------
|
| Now we will register a few bindings in the service container. We will
| register the exception handler and the console kernel. You may add
| your own bindings here if you like or you can make another file.
|
*/

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

/*
|--------------------------------------------------------------------------
| Register Config Files
|--------------------------------------------------------------------------
|
| Now we will register the "app" configuration file. If the file exists in
| your configuration directory it will be loaded; otherwise, we'll load
| the default version. You may register other files below as needed.
|
*/

$app->configure('app');
$app->configure('queue');
$app->configure('volt');
$app->configure('mail');
$app->configure('permission');
$app->configure('repository');
$app->configure('workflow');

/*
|--------------------------------------------------------------------------
| Register Middleware
|--------------------------------------------------------------------------
|
| Next, we will register the middleware with the application. These can
| be global middleware that run before and after each request into a
| route or middleware that'll be assigned to some specific routes.
|
*/

// $app->middleware([
//     App\Http\Middleware\ExampleMiddleware::class
// ]);

// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

$app->routeMiddleware([
    'auth' => App\Http\Middleware\Authenticate::class,
    'role' => Spatie\Permission\Middlewares\RoleMiddleware::class,
    'permission' => Spatie\Permission\Middlewares\PermissionMiddleware::class,
    'roleOrPermission' => Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
    'cors' => App\Http\Middleware\v1\CorsMiddleware::class,
    'app.v1.lang' => App\Http\Middleware\v1\LangMiddleware::class,
    'app.v1.auth' => App\Http\Middleware\v1\AuthMiddleware::class,
    'log' => App\Http\Middleware\v1\LogMiddleware::class,
    'join.tender' => App\Http\Middleware\v1\JoinTenderMiddleware::class,
    'request.filter' => App\Http\Middleware\v1\RequestFilterMiddleware::class,
    'delete.account' => App\Http\Middleware\v1\DeleteAccountMiddleware::class,
    'update.account' => App\Http\Middleware\v1\UpdateAccountMiddleware::class,
    'create.account' => App\Http\Middleware\v1\CreateAccountMiddleware::class,
    'role.assigner' => App\Http\Middleware\v1\RoleAssignerMiddleware::class,
    'tender.item.comply' => App\Http\Middleware\v1\TenderItemComplyMiddleware::class,
    'tender.item.component.comply' => App\Http\Middleware\v1\TenderItemComponentComplyMiddleware::class,
    'notification' => App\Http\Middleware\v1\NotificationMiddleware::class,
    'activation' => App\Http\Middleware\v1\ActivationMiddleware::class,
]);

/*
|--------------------------------------------------------------------------
| Register Service Providers
|--------------------------------------------------------------------------
|
| Here we will register all of the application's service providers which
| are used to bind services into the container. Service providers are
| totally optional, so you are not required to uncomment this line.
|
*/

$app->register(App\Providers\AppServiceProvider::class);
//$app->register(App\Providers\AuthServiceProvider::class);
$app->register(App\Providers\EventServiceProvider::class);
$app->register(App\Providers\ApplicationServiceProvider::class);

$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
$app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
$app->register(Pearl\RequestValidate\RequestServiceProvider::class);
$app->register(Laravolt\Indonesia\ServiceProvider::class);
$app->register(Illuminate\Mail\MailServiceProvider::class);
$app->register(Yajra\DataTables\DataTablesServiceProvider::class);
$app->register(Spatie\Permission\PermissionServiceProvider::class);
$app->register(ZeroDaHero\LaravelWorkflow\WorkflowServiceProvider::class);

if ($app->environment() !== 'production') {
    $app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
}

$app->alias('Indonesia', Laravolt\Indonesia\Facade::class);
$app->alias('mailer', Illuminate\Mail\Mailer::class);
$app->alias('mailer', Illuminate\Contracts\Mail\Mailer::class);
$app->alias('mailer', Illuminate\Contracts\Mail\MailQueue::class);
$app->alias('cache', Illuminate\Cache\CacheManager::class);
$app->alias('Workflow', ZeroDaHero\LaravelWorkflow\Facades\WorkflowFacade::class);

/*
|--------------------------------------------------------------------------
| Load The Application Routes
|--------------------------------------------------------------------------
|
| Next we will include the routes file so that they can all be added to
| the application. This will provide all of the URLs the application
| can respond to, as well as the controllers that may handle them.
|
*/

$app->router->group([
    'namespace' => 'App\Http\Controllers',
], function ($router) {
    require __DIR__.'/../routes/web.php';
});

$app->router->group([
    'prefix' => 'v1',
    'namespace' => 'App\Http\Controllers\App\v1',
    'middleware' => ['cors', 'app.v1.lang', 'app.v1.auth', 'request.filter', 'role.assigner', 'log'],
    'as' => 'app'
], function ($router) {
    require __DIR__ . '/../routes/App/v1/api.php';
});

$app->router->group([
    'prefix' => 'v1/bo',
    'namespace' => 'App\Http\Controllers\BackOffice\v1',
    'middleware' => ['cors', 'app.v1.lang', 'app.v1.auth', 'request.filter', 'log', 'auth', 'permission:accessBackOffice'],
    'as' => 'bo'
], function ($router) {
    require __DIR__ . '/../routes/BackOffice/v1/api.php';
});

return $app;
