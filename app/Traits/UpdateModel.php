<?php

namespace App\Traits;

trait UpdateModel
{
    protected $modelId = null;

    public function modelId()
    {
        if ($this->modelId !== null) {
            return $this->modelId;
        }

        $route = request()->route();

        return $this->model = $route[2]['id'] ?? null;
    }
}
