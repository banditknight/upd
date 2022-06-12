<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderTechnicalBidEvaluationSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderTBE');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'assessmentCriteriaId' => $data[1],
//                'assessmentCriteriaItem' => $data[2],
                'requirement' => $data[3],
                'weight' => $data[4],
                'tenderItemId' => $data[5]
            ];
        }

        DB::table('tenderTechnicalBidEvaluations')->insert($dataSeeder);
    }
}
