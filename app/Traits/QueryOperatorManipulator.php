<?php

namespace App\Traits;

trait QueryOperatorManipulator
{
    public function queryOperatorDecider($key, $value) : array
    {
        $where = 'where';

        $hasPrefixForLike = str_contains(substr($key,0, 2), 'i_');
        $operator = $hasPrefixForLike ? 'LIKE' : '=';

        $key = $hasPrefixForLike ? str_replace('i_', '', $key) : $key;
        $value = $hasPrefixForLike ? '%'. $value .'%' : $value;

        if (!$hasPrefixForLike) {
            $hasPrefixForOrWhere = str_contains(substr($key,0, 3), 'ow_');
            $where = $hasPrefixForOrWhere ? 'orWhere' : $where;

            $key = $hasPrefixForOrWhere ? str_replace('ow_', '', $key) : $key;
        }

        return [
            'key' => $key,
            'value' => $value,
            'operator' => $operator,
            'where' => $where,
        ];
    }
}
