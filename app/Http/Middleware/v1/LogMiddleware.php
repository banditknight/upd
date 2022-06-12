<?php

namespace App\Http\Middleware\v1;

use App\Traits\Log;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class LogMiddleware
{
    use Log;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \JsonException
     */
    public function handle($request, Closure $next)
    {
        // Pre-Middleware Action
        $method = $request->getMethod();

        $logData['request'] = $request->all();
        $logData['header'] = $request->headers->all();
        $logData['httpMethod'] = $method;
        $logData['oldValue'] = null;
        $logData['newValue'] = null;
        $logData['table'] = null;
        $logData['recordID'] = null;
        $logData['ipAddress'] = $request->ip();
        $logData['action'] = 0;
        $logData['token'] = empty(request()->header('Authorization')) ? null : explode(' ',request()->header('Authorization'))[1];

        $logData['userId'] = $request->get('userId');
        $logData['vendorId'] = $request->get('vendorId');

        $model = null;
        $modelId = null;

        unset( $logData['request']['password']);

        if ($method === Request::METHOD_PUT || $method === Request::METHOD_POST || $method === Request::METHOD_DELETE) {

            if($method === Request::METHOD_POST) $logData['action'] = 2; // CREATE
            if($method === Request::METHOD_PUT) $logData['action'] = 3; // UPDATE
            if($method === Request::METHOD_DELETE) $logData['action'] = 4; // DELETE

            $route = request()->route();

            if(!empty($route[1]['model'])){
                $model = $route[1]['model'];
                $logData['table'] = app($model)->getTable();
                
                if(!empty($route[2]['id'])){
                    $modelId = $route[2]['id'];
                    $oldValue = [];
                    if(class_exists($model)){
                        $logData['recordID'] = $modelId;

                        $oldValue = $model::find($modelId);
                        if($oldValue instanceof Model){
                            $oldValue = $oldValue->toArray();
                        }else{
                            $oldValue = [];
                        }
                    }

                    $logData['oldValue'] = $oldValue;
                }
            }

        }

        $response = $next($request);

        // Post-Middleware Action
        if($response instanceof \Illuminate\Http\JsonResponse){
            $logData['response'] = $response->getData(true);
            if(!empty($logData['response']['data']['accessToken'])){
                $logData['action'] = 1;
                $logData['token'] = $logData['response']['data']['accessToken'];
                $logData['userId'] = $logData['response']['data']['id'];
            }
        }

        if($model != null){
            if(!empty($response->getData(true)['data']['id'])){
                $modelId = $response->getData(true)['data']['id'];
                $logData['recordID'] = $modelId;
                $logData['newValue'] = $model::find($modelId) ? $model::find($modelId)->toArray() : [];
            }
        }

        $logData['status'] = $response->status();

        if($logData['action'] == 1){
            $this->info($logData);
        }

        return $response;
    }
}
