<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderParticipantSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderParticipant');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'userId' => $data[1],
                'vendorId' => $data[2],
                'tbeScore' => $data[3],
                'cbeScore' => $data[4],
                'ratioFinancial' => $data[5],
                'joinStatusId' => $data[6],
            ];
        }

        DB::table('tenderParticipants')->insert($dataSeeder);
    }
}
