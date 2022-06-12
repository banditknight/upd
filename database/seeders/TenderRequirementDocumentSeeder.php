<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderRequirementDocumentSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderRequirementDocuments');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'name' => $data[1],
                'description' => $data[2],
                'stepType' => $data[3],
                'isMandatory' => $data[4],
                'attachment' => $data[5],

                'praQualification' => $data[6],
                'technical' => $data[7],
                'commercial' => $data[8]
            ];
        }

        DB::table('tenderRequirementDocuments')->insert($dataSeeder);
    }
}
