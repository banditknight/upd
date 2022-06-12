<?php

namespace Database\Seeders;

use App\Models\v1\ScopeOfWork;
use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class ScopeOfWorkSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'ScopeOfWork');

         $dataSeeder = [];
         foreach ($dataOnSheets as $key => $data) {
             if ($key === 0) {
                 continue;
             }

             $dataSeeder[] = [
                 'code' => $data[0],
                 'name' => $data[1],
                 'description' => $data[2],
                 'parentCode' => $data[3]
             ];
         }

         DB::table('scopeOfWorks')->insert($dataSeeder);
    }
}
