<?php

namespace Yuliusardian\LumenResourceRouting\Routing;

class PendingResourceRegistration extends \ElemenX\AdvancedRoute\Routing\PendingResourceRegistration
{
    /**
     * Set a model to the resource.
     *
     * @param  mixed  $model
     * @return PendingResourceRegistration
     */
    public function model($model)
    {
        $this->options['model'] = $model;

        return $this;
    }

    /**
     * Set a repository to the resource.
     *
     * @param  mixed  $repository
     * @return PendingResourceRegistration
     */
    public function repository($repository)
    {
        $this->options['repository'] = $repository;

        return $this;
    }

    public function requestFilter($requestFilter)
    {
        $this->options['requestFilter'] = $requestFilter;

        return $this;
    }

    public function requestCriteria($requestCriteria)
    {
        $this->options['requestCriteria'] = $requestCriteria;

        return $this;
    }
}
