<?php

namespace Yuliusardian\LumenResourceRouting\Routing;

class ResourceRegistrar extends \ElemenX\AdvancedRoute\Routing\ResourceRegistrar
{
    protected function getResourceAction($resource, $controller, $method, $options)
    {
        $name = $this->getResourceRouteName($resource, $method, $options);

        $action = ['as' => $name, 'uses' => $controller . '@' . $method];

        if (isset($options['middleware'])) {
            $action['middleware'] = $options['middleware'];
        }

        if (isset($options['model'])) {
            $action['model'] = $options['model'];
        }

        if (isset($options['repository'])) {
            $action['repository'] = $options['repository'];
        }

        if (isset($options['requestFilter'])) {
            $action['requestFilter'] = $options['requestFilter'];
        }

        if (isset($options['requestCriteria'])) {
            $action['requestCriteria'] = $options['requestCriteria'];
        }

        $action['method'] = $method;

        return $action;
    }
}
