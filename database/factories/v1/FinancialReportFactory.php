<?php

namespace Database\Factories\v1;

use App\Models\v1\FinancialReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class FinancialReportFactory extends Factory
{
    protected $model = FinancialReport::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->sentence,
    	];
    }
}
