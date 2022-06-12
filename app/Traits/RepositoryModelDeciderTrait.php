<?php

namespace App\Traits;

use App\Exceptions\Custom\Repository\RepositoryModelNotFoundException;
use App\Repositories\ResourceRepository;

trait RepositoryModelDeciderTrait
{
    protected $repo;

    /**
     * @throws RepositoryModelNotFoundException
     */
    public function getRepo()
    {
        $route = request()->route();

        if (!isset($route[1]['method'])) {
            return null;
        }

        if (!isset($route[1]['model'])) {
            throw new RepositoryModelNotFoundException();
        }

        $model = $route[1]['model'];

        $repository = $route[1]['repository'] ?? ResourceRepository::class;

        return new $repository(new $model());
    }
}
