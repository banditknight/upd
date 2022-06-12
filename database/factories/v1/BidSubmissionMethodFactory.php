<?php

namespace Database\Factories\v1;

use App\Models\v1\BidSubmissionMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class BidSubmissionMethodFactory extends Factory
{
    protected $model = BidSubmissionMethod::class;

    public function definition(): array
    {
    	return [
            'code' => $this->faker->name,
            'name' => $this->faker->name
    	];
    }
}
