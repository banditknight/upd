<?php

namespace App\Http\Middleware\v1;

use App\Events\v1\ActivationAccount;
use App\Models\v1\Vendor;
use Closure;
use Symfony\Component\HttpFoundation\Request;

class ActivationMiddleware
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

        if (
            $request->getMethod() === Request::METHOD_PUT &&
            isset($request->route()[2]['id'])
        ) {
            event(new ActivationAccount(Vendor::find($request->route()[2]['id']), $request->all()));
        }

        $response = $next($request);

        // Post-Middleware Action

        return $response;
    }
}
