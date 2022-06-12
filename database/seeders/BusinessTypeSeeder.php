<?php

namespace Database\Seeders;

use App\Models\v1\BusinessType;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessTypeSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Business');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!is_numeric($data[0])) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2]
            ];
        }

        DB::table('businessTypes')->insert($dataSeeder);
    }
}
