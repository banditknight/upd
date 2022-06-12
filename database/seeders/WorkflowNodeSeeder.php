<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\ExcelReader;

class WorkflowNodeSeeder extends Seeder
{
    use ExcelReader;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'WFNode');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2],
                'description' => $data[3],
                'comment' => $data[4],
                'action' => $data[5],
                'columnName' => $data[6],
                'workflowId' => $data[7],
                'responsibleRoleId' => $data[8],
            ];
        }

        DB::table('workflowNodes')->insert($dataSeeder);
    }
}
