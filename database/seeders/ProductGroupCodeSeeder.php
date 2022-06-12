<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\v1\ProductGroupCode;

class ProductGroupCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductGroupCode::create(['code'=>'001','name'=>'Tools','description'=>'Tools Group']);        
    }
}
