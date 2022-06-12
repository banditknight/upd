<?php

namespace App\Http\Middleware\v1;

use App\Models\v1\AppKey;
use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $hasHeaderAppKey = $request->hasHeader('x-app-key');

        if (!$hasHeaderAppKey && $request->getMethod() !== Request::METHOD_OPTIONS) {
            return response([
                'status' => [
                    'code' => Response::HTTP_UNAUTHORIZED,
                    'message' => __('middleware.middleware_application_auth_status_message_unauthorized')
                ],
                'data' => null
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Pre-Middleware Action

        $response = $next($request);

        if (env('SKIP_APP_KEY', false)) {
            return $response;
        }

        $appKey = $request->headers->get('x-app-key');
        $appKeyObject = AppKey::where('key', '=', $appKey)->first();

        // if (!$appKeyObject) {
        //     return response([
        //         'status' => [
        //             'code' => Response::HTTP_UNAUTHORIZED,
        //             'message' => __('middleware.middleware_application_key_not_found')
        //         ],
        //         'data' => null
        //     ], Response::HTTP_UNAUTHORIZED);
        // }

        // if (!$appKeyObject->isActive) {
        //     return response([
        //         'status' => [
        //             'code' => Response::HTTP_FORBIDDEN,
        //             'message' => __('middleware.middleware_application_key_is_not_active')
        //         ],
        //         'data' => null
        //     ], Response::HTTP_FORBIDDEN);
        // }

        // Post-Middleware Action

        return $response;
    }
}
