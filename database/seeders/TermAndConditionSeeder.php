<?php

namespace Database\Seeders;

use App\Models\v1\TermAndCondition;
use App\Models\v1\UserManual;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermAndConditionSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'TermAndCondition');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'title' => $data[0],
                'content' => $data[1]
            ];
        }

        DB::table('termAndConditions')->insert($dataSeeder);
    }
}
