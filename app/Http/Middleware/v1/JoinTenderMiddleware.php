<?php

namespace App\Http\Middleware\v1;

use App\Exceptions\Custom\JoinTender\{AlreadyJoinTenderException,
    VendorProfileInActiveException,
    VendorProfileInCompleteException};
use App\Exceptions\Custom\Repository\RepositoryModelNotFoundException;
use App\Models\v1\TenderParticipant;
use App\Traits\HasRouteModel;
use App\Traits\VendorStatusTrait;
use Closure;
use Illuminate\Http\Request;

class JoinTenderMiddleware
{
    use HasRouteModel, VendorStatusTrait;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws RepositoryModelNotFoundException
     * @throws AlreadyJoinTenderException
     * @throws VendorProfileInCompleteException
     * @throws VendorProfileInActiveException
     */
    public function handle($request, Closure $next)
    {
        // Pre-Middleware Action
        $routeModel = $this->routeModel($request->route());

        $model = null;
        /** @var $routeModel TenderParticipant */
        if (class_exists($routeModel)) {
            $model = $routeModel::where([
                ['tenderId', '=', $request->get('tenderId')],
                ['vendorId', '=', $request->get('vendorId')],
            ])->first();
        }

        if ($model) {
            throw new AlreadyJoinTenderException();
        }

        $user = auth()->user();

        if ($user && $user->vendor && !$this->vendorCanJoinTender($user->vendor)) {
            throw new VendorProfileInCompleteException();
        }

        if ($user && !$user->vendor->isCompleted) {
            throw new VendorProfileInCompleteException();
        }

        if ($user && !$user->vendor->isActive) {
            throw new VendorProfileInActiveException();
        }

        // tbe and cbe will be updated once user/vendor fill item comply.
        $request->request->set('tbeScore', 0);
        $request->request->set('tbeScore', 0);

        // Post-Middleware Action

        return $next($request);
    }
}
