<?php
namespace App\Criteria;

use App\Contracts\CriteriaInterface;
use App\Contracts\RepositoryInterface;
use App\Traits\QueryOperatorManipulator;
use App\Traits\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

/**
 * Class RequestCriteria
 * @package App\Criteria
 * @author Anderson Andrade <contato@andersonandra.de>
 */
class RequestCriteria implements CriteriaInterface
{
    use User, QueryOperatorManipulator;

    public CONST SORT_BY = [
        'ASC',
        'DESC'
    ];

    protected $request;

    public function __construct()
    {
        $this->request = request();
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $route = $this->request->route();

        if (!isset($route[1])) {
            return $model;
        }

        if (!isset($route[1]['model'])) {
            return $model;
        }

        $requestedModel = $route[1]['model'];

        if (!class_exists($requestedModel)) {
            return $model;
        }

        if ($model instanceof Model && !method_exists($model, 'getTable')) {
            return $model;
        }

        $tableName = $model instanceof Builder ? $model->getModel()->getTable() : $model->getTable();
        $allRequest = $this->request->all();

        if (!$allRequest) {
            return $model;
        }

        $hasQueryAndFieldParams = isset($allRequest['fields'], $allRequest['q']);
        $fields = $hasQueryAndFieldParams ? $allRequest['fields'] : '';
        $explodedFields = explode(',', $fields);
        $allRequest = $hasQueryAndFieldParams ? array_merge($allRequest, array_flip($explodedFields)) : $allRequest;

        $joins = $model instanceof Builder ? $model->getQuery()->joins : null;
        $joinedTable = $joins ? array_merge([$tableName], array_column($joins, 'table')) : null;

        $sortKey = null;
        $sortBy = null;
        $isShouldSort = false;
        if (isset($allRequest['sortKey'])) {
            $sortKey = $allRequest['sortKey'] ?? null;

            $isShouldSort = Schema::hasColumn($tableName, $sortKey) || Schema::hasColumn($tableName, Str::snake($sortKey));

            $sortBy = strtoupper($allRequest['sortBy'] ?? '');
            $sortBy = in_array($sortBy, self::SORT_BY) ? $sortBy : 'ASC';

            unset($allRequest['sortKey'], $allRequest['sortBy']);
        }

        if ($isShouldSort) {
            $model = $model->orderBy($sortKey, $sortBy);
        }

        if (isset($allRequest['docStatus'])) {
            $model = $model->where('docStatusId',$allRequest['docStatus']);
        }

        foreach ($allRequest as $key => $value) {
            $inFields = in_array($key, $explodedFields, false);
            $value = $inFields ? $allRequest['q'] : $value;

            if ($key === 'fields' || $key === 'q') {
                continue;
            }

            if (
                ($key === 'userId' || $key === 'vendorId') &&
                $this->getUser() &&
                $this->getUser()->hasRole('superAdmin')
            ) {
                continue;
            }

            if (
                $key === 'userId' &&
                $this->getUser() &&
                $this->getUser()->isPrimary &&
                $this->getUser()->hasRole('vendor')
            ) {
                continue;
            }

            $explodedKey = $joins ? explode('_', $key) : [];
            if ($joins && count($explodedKey) === 2) {
                $model = in_array($explodedKey[0], $joinedTable, false) ?
                    $model->where(sprintf('%s.%s', $explodedKey[0], $explodedKey[1]), '=', $value) : $model;

                continue;
            }

            $queryOperatorDecider = $this->queryOperatorDecider($key, $value);
            if (Schema::hasColumn($tableName, $queryOperatorDecider['key'])) {
                $model = $model->{$queryOperatorDecider['where']}(
                    $queryOperatorDecider['key'],
                    $queryOperatorDecider['operator'],
                    $queryOperatorDecider['value']
                );
                continue;
            }

            if (Schema::hasColumn($tableName, Str::snake($queryOperatorDecider['key']))) {
                $model = $model->{$queryOperatorDecider['where']}(
                    Str::snake($queryOperatorDecider['key']),
                    $queryOperatorDecider['operator'],
                    $queryOperatorDecider['value']
                );
            }
        }

        return $model;
    }
}
