<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderItemComplySeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderItemComply');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'userId' => $data[0],
                'vendorId' => $data[1],
                'tenderId' => $data[2],
                'tenderItemId' => $data[3],
                'isComply' => $data[4],
                'comment' => $data[5]
            ];
        }

        DB::table('tenderItemComplies')->insert($dataSeeder);
    }
}
