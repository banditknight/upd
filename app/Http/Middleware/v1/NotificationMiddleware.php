<?php

namespace App\Http\Middleware\v1;

use App\Traits\HasRouteModel;
use App\Traits\User;
use Closure;
use Symfony\Component\HttpFoundation\Request;

class NotificationMiddleware
{
    use HasRouteModel, User;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->getUser();
        // Pre-Middleware Action
        $method = $request->getMethod();
        if (
            $method === Request::METHOD_PUT
        ) {
            $request = new \Laravel\Lumen\Http\Request();
            $request->request->set('isRead', true);
        }

        if (
            $method === Request::METHOD_GET
        ) {
            $toUserId = null;
            if ($user) {
                $toUserId = $user->hasRole('superAdmin') ? 0 : $user->id;
            }
            $request->request->set('toUserId', $toUserId);
        }

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
