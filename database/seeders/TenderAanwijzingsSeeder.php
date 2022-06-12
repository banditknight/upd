<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderAanwijzingsSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TenderSchedule tenderSchedules
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderAanwijzing');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'eventName' => $data[1],
                'venue' => $data[2],
                'from' => $data[3],
                'to' => $data[4],
                'stateId' => $data[5],
                'note' => $data[6]
            ];
        }

        DB::table('tenderAanwijzings')->insert($dataSeeder);
    }
}
