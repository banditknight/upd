<?php

namespace Database\Seeders;

use App\Models\v1\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert(
            [
                [
                    'name' => 'FINISHED'
                ],
                [
                    'name' => 'PENDING'
                ],
                [
                    'name' => 'IN_PROGRESS'
                ],
                [
                    'name' => 'CANCELED'
                ]
            ]
        );
    }
}
