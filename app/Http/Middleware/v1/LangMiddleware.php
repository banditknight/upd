<?php

namespace App\Http\Middleware\v1;

use Closure;

class LangMiddleware
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
        $lang = $request->hasHeader('x-app-lang') ?
            $request->header('app-lang') : 'en';

        app()->setLocale($lang);

        // Post-Middleware Action
        return $next($request);
    }
}
