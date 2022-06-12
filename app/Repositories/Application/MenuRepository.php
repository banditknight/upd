<?php

namespace App\Repositories\Application;

use App\Models\v1\Menu;
use App\Repositories\ResourceRepository;

class MenuRepository extends ResourceRepository
{
    public function paginate($limit = null, $columns = ['*'], string $method = "paginate")
    {
        return Menu::where('isParent', '=', 1)->paginate($limit, $columns);
    }
}
