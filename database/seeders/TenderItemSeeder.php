<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderItemSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderItem');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'productCodeId' => $data[1],
                'productGroupCodeId' => $data[2],
                'description' => $data[3],
                'quantity' => $data[4],
                'unitOfMeasureId' => $data[5],
                'currencyId' => $data[6],
                'value' => $data[7],
            ];
        }

        DB::table('tenderItems')->insert($dataSeeder);
    }
}
