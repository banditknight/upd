<?php

namespace App\Http\Middleware\v1;

use App\Exceptions\Custom\Account\{CantDeleteAccountDueMinimalAccountException,
    CantDeleteSelfException,
    PrimaryAccountCantBeDeleteException,
    PrimaryAccountOnlyAllowedToDeleteException};
use App\Traits\User;
use Closure;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class DeleteAccountMiddleware
{
    use User;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws CantDeleteSelfException
     * @throws PrimaryAccountCantBeDeleteException
     * @throws CantDeleteAccountDueMinimalAccountException
     */
    public function handle($request, Closure $next)
    {
        $checkUser = \App\Models\v1\User::find($request->route('id'));
        DB::beginTransaction();
        // Pre-Middleware Action
        $response = $next($request);

        if ($request->getMethod() !== Request::METHOD_DELETE) {
            return $response;
        }

        $user = $this->getUser();
        if (!$user) {
            return $response;
        }

        if ($checkUser && $checkUser->isPrimary) {
            DB::rollBack();
            throw new PrimaryAccountCantBeDeleteException();
        }

        if ((int)$request->route('id') === $user->id && $request->getMethod() === Request::METHOD_DELETE) {
            if ($user->isPrimary === 1) {
                DB::rollBack();
                throw new PrimaryAccountCantBeDeleteException();
            }

            DB::rollBack();
            throw new CantDeleteSelfException();
        }

        if ($user->isPrimary === null) {
            DB::rollBack();
            throw new PrimaryAccountOnlyAllowedToDeleteException();
        }

        DB::commit();
        // Post-Middleware Action
        return $response;
    }
}
