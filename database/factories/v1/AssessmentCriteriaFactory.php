<?php

namespace Database\Factories\v1;

use App\Models\v1\AssessmentCriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssessmentCriteriaFactory extends Factory
{
    protected $model = AssessmentCriteria::class;

    public function definition(): array
    {
    	return [
            'code' => 'CONTRACT_DATA',
            'name' => 'Contract Data',
            'description' => 'Contract'
    	];
    }
}
