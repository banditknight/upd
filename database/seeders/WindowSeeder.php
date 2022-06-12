<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class WindowSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Window');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }
            $dataSeeder[] = [
                'organizationId' => $data[1],
                'name' => $data[2],
                'description' => $data[3],
                'title' => $data[4],
                'value' => $data[5],
            ];
        }

        DB::table('windows')->insert($dataSeeder);        
    }
}
