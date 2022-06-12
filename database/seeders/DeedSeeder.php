<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeedSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Deed');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'userId' => $data[0],
                'vendorId' => $data[1],
                'deedTypeId' => $data[2],
                'number' => $data[3],
                'issuedDate' => $this->dateToTimestamp($data[4]),
                'notaryFullName' => $data[5],
                'ackLetterNumber' => $data[6],
                'ackLetterDate' => $this->dateToTimestamp($data[7]),
            ];
        }

        DB::table('deeds')->insert($dataSeeder);
    }
}
