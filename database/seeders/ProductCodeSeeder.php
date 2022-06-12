<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\v1\ProductCode;

class ProductCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCode::create(['productGroupCodeId'=>1,'code'=>'001','name'=>'Tools']);
    }
}
