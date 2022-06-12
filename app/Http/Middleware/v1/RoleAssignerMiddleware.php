<?php

namespace App\Http\Middleware\v1;

use App\Traits\HasRouteModel;
use App\Traits\ResponseToModel;
use App\Traits\RoleAssigner;
use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleAssignerMiddleware
{
    use HasRouteModel, ResponseToModel, RoleAssigner;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws \App\Exceptions\Custom\Repository\RepositoryModelNotFoundException
     */
    public function handle($request, Closure $next)
    {
        // Pre-Middleware Action
        $routeModel = $this->routeModel($request->route());

        /** @var \Illuminate\Http\JsonResponse $response */
        $response = $next($request);

        // Post-Middleware Action

        if (
            $routeModel &&
            $request->getMethod() === Request::METHOD_POST &&
            method_exists($routeModel, 'roles') &&
            $response->getStatusCode() === Response::HTTP_OK
        ) {
            $model = $this->jsonToModel($response,$routeModel);
            $this->assignDefaultRole($model);
        }

        return $response;
    }
}
