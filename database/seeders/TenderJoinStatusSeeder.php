<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderJoinStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Invited',
            'description' => 'Vendor Invited'
        ]);
        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Invitation Opened',
            'description' => 'Vendor open invitation'
        ]);
        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Invitation Accepted',
            'description' => 'Vendor accept invitation'
        ]);
        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Invitation Rejected',
            'description' => 'Vendor reject invitation'
        ]);

        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Success',
            'description' => 'Success Join'
        ]);

        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Waiting for document',
            'description' => 'Waiting for document'
        ]);

        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Not qualified',
            'description' => 'Not qualified'
        ]);

        DB::table('tenderJoinStatuses')->insert([
            'name' => 'Awarded',
            'description' => 'Vendor awarded'
        ]);
    }
}
