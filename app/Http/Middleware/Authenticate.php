<?php

namespace App\Http\Middleware;

use App\Exceptions\Custom\Account\UnauthorizedException;
use App\Models\v1\User;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     * @throws UnauthorizedException
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            throw new UnauthorizedException();
        }

        /** @var User $authUser */
        $authUser = $this->auth->guard($guard)->user();

        $request->request->set('userId', $authUser->id);
        $request->request->set('vendorId', $authUser->vendorId);

        return $next($request);
    }
}
