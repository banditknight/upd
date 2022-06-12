<?php

namespace App\Http\Middleware\v1;

use App\Exceptions\Custom\Account\PrimaryAccountOnlyAllowedToUpdateException;
use App\Traits\User;
use Closure;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class UpdateAccountMiddleware
{
    use User;

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

        if ($request->getMethod() !== Request::METHOD_PUT) {
            return $response;
        }

        $user = $this->getUser();

        if ($user && $user->isPrimary === null && $user->id !== (int)$request->route('id')) {
            DB::rollBack();
            throw new PrimaryAccountOnlyAllowedToUpdateException();
        }

        DB::commit();
        // Post-Middleware Action
        return $response;
    }
}
