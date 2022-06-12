<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait RoleAssigner
{
    public function assignDefaultRole($model)
    {
        if (!$model instanceof Model) {
            return null;
        }

        $model->assignRole($model::$defaultRole ?? 'vendor');
    }
}
