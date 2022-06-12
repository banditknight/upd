<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitOfMeasureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unitOfMeasures')->insert([
            'code' => 'Pc',
            'name' => 'Piece',
            'description' => 'Piece',
        ]);
        DB::table('unitOfMeasures')->insert([
            'code' => 'M',
            'name' => 'Meter',
            'description' => 'Meter',
        ]);
        DB::table('unitOfMeasures')->insert([
            'code' => 'L',
            'name' => 'Liter',
            'description' => 'Liter',
        ]);
        DB::table('unitOfMeasures')->insert([
            'code' => 'Kg',
            'name' => 'Kilogram',
            'description' => 'Kilogram',
        ]);
    }
}
