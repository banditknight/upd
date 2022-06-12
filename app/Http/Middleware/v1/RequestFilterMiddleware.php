<?php

namespace App\Http\Middleware\v1;

use App\Contracts\RequestFilterInterface;
use Closure;

class RequestFilterMiddleware
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
        // Pre-Middleware Action
        $requestExcept = $this->resolveRequestFilter($request->route());

        if ($requestExcept instanceof RequestFilterInterface) {
            if ($requestExcept->getExcept()) {
                $request->request->replace($requestExcept->except());
            }

            if ($requestExcept->getOnly()) {
                $request->request->replace($requestExcept->only());
            }
        }

        // Post-Middleware Action

        return $next($request);
    }

    private function resolveRequestFilter($route)
    {
        if (!isset($route[1]['requestFilter'])) {
            return null;
        }

        $requestFilterClass = $route[1]['requestFilter'];

        if (!class_exists($requestFilterClass)) {
            return null;
        }

        return new $requestFilterClass();
    }
}
