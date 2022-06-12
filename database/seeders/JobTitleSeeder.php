<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\v1\JobTitle;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobTitle::insert([
            ['code'=>'001', 'name'=>'Director'],
            ['code'=>'002', 'name'=>'Finance Manager'],
            ['code'=>'003', 'name'=>'Marketing Manager'],
        ]);
    }
}
