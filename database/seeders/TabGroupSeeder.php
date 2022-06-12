<?php

namespace Database\Seeders;

use App\Models\v1\TabGroup;
use Illuminate\Database\Seeder;

class TabGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TabGroup::factory()->count(2)->create()->each(function($item, $key) {

        });
    }
}
