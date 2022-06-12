<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\ExcelReader;

class AssessmentCriteriaItemSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'AssessmentCriteriaItem');

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
                'name' => $data[2],
                'point' => $data[3],
                'parentId' => $data[4],
                'isSummary' => $data[5],
                'assessmentCriteriaId' => $data[6],
                'tenderId' => $data[7],
                'tenderItemId' => $data[8],
            ];
        }

        DB::table('assessmentCriteriaItems')->insert($dataSeeder);

    }
}
