<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Traits\ExcelReader;

class WorkflowSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Workflow');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[0],
                'name' => $data[1],
                'description' => $data[2],
                'modelName' => $data[3],
                'startNodeId' => $data[4],
            ];
        }

        DB::table('workflows')->insert($dataSeeder);

    }
}
