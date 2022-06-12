<?php

namespace Database\Seeders;

use App\Models\v1\AppKey;
use Illuminate\Database\Seeder;

class AppKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppKey::factory()->count(1)->create();
    }
}
