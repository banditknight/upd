<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderDocumentSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderDocument');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'name' => $data[1],
                'description' => $data[2],
                'attachment' => $data[3],
            ];
        }

        DB::table('tenderDocuments')->insert($dataSeeder);
    }
}
