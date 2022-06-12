<?php

namespace App\Traits;

use App\Models\v1\AbstractModel;

trait ResponseToModel
{
    public function jsonToModel(\Illuminate\Http\JsonResponse $response, $model)
    {
        $original = $response->getOriginalContent();
        $modelId = $original['data']['id'] ?? null;

        if (!$modelId) {
            return null;
        }

        /** @var AbstractModel|null $modelById */
        $modelById = $model::find($modelId);

        if (!$modelById) {
            return null;
        }

        return $modelById;
    }
}
