<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\ExcelReader;

class AssessmentCriteriaSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'AssessmentCriteria');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2],
                'weight' => $data[3],
                'tenderId' => $data[4],
                'tenderItemId' => $data[5],
            ];
        }

        DB::table('assessmentCriteria')->insert($dataSeeder);

    }
}
