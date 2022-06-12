<?php

namespace Database\Factories\v1;

use App\Models\v1\TenderDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenderDetailFactory extends Factory
{
    protected $model = TenderDetail::class;

    public function definition(): array
    {
    	return [
            'tenderId' => 1
    	];
    }
}
