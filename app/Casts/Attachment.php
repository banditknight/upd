<?php

namespace App\Casts;

use App\Models\v1\Asset;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Attachment implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        $asset = Asset::find($value);

        if (!$asset) {
            return null;
        }

        return $asset->only(['id', 'url']);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return [$key => $value];
    }
}
