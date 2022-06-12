<?php

namespace App\Http\Middleware\v1;

use Closure;

class ThrottleRequestsMiddleware
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

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
