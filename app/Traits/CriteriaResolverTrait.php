<?php

namespace App\Traits;

trait CriteriaResolverTrait
{
    public function getCriterias()
    {
        $route = request()->route();

        if (!isset($route[1]['requestCriteria'])) {
            return null;
        }

        return $route[1]['requestCriteria'] ?? [];
    }
}
