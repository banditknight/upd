<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\ExcelReader;

class WorkflowTransitionSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'WFTransition');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'workflowNodeId' => $data[0],
                'workflowNextNodeId' => $data[1],
                'sequence' => $data[2],
            ];
        }

        DB::table('workflowTransitions')->insert($dataSeeder);
    }
}
