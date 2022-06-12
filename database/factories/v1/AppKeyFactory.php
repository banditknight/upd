<?php

namespace Database\Factories\v1;

use App\Models\v1\AppKey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppKeyFactory extends Factory
{
    protected $model = AppKey::class;

    public function definition(): array
    {
    	return [
            'key' => Str::random(64),
            'channelId' => 1
    	];
    }
}
