<?php

namespace App\Traits;

use App\Exceptions\Custom\Repository\RepositoryModelNotFoundException;
use Illuminate\Support\Facades\Route;

trait HasRouteModel
{
    /**
     * @throws RepositoryModelNotFoundException
     */
    public function routeModel($route = null)
    {
        if (!$route instanceof Route) {
            $route = request()->route();
        }

        if (!isset($route[1]['method'])) {
            return null;
        }

        if (!isset($route[1]['model'])) {
            throw new RepositoryModelNotFoundException();
        }

        return $route[1]['model'];
    }
}
