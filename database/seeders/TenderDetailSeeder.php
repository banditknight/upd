<?php

namespace Database\Seeders;

use App\Models\v1\TenderDetail;
use Illuminate\Database\Seeder;

class TenderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TenderDetail::factory()->count(1)->create();
    }
}
