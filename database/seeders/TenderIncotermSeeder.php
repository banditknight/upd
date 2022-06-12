<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderIncotermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tenderIncoterms')->insert([
            [
                'code' => 'FOB',
                'description' => 'Free on Board'
            ],
            [
                'code' => 'EXW',
                'description' => 'Ex Works'
            ],
            [
                'code' => 'FCA',
                'description' => 'Free Carrier'
            ],
            [
                'code' => 'CPT',
                'description' => 'Carriage Paid To'
            ],
            [
                'code' => 'CIP',
                'description' => 'Carriage and Insurance Paid to'
            ],
            [
                'code' => 'DPU',
                'description' => 'Delivered At Place Unloaded'
            ],
            [
                'code' => 'DAP',
                'description' => 'Delivered At Place'
            ],
            [
                'code' => 'DDP',
                'description' => 'Delivered Duty Paid'
            ],
            [
                'code' => 'FAS',
                'description' => 'Free Alongside Ship'
            ],
            [
                'code' => 'CFR',
                'description' => 'Cost and Freight'
            ],
            [
                'code' => 'CIF',
                'description' => 'Cost, Insurance & Freight'
            ],
        ]);
    }
}
