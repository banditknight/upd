<?php

namespace Database\Seeders;

use App\Models\v1\FieldOfStudy;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldOfStudySeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // FieldOfStudy::factory()->count(10)->create();

        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'FieldOfStudy');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[1] || !$data[2]) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[1],
                'name' => $data[2],
                'educationId' => $data[3]
            ];
        }

        DB::table('fieldOfStudies')->insert($dataSeeder);        
    }
}
