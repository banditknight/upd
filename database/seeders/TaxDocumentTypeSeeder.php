<?php

namespace Database\Seeders;

use App\Models\v1\TaxDocumentType;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxDocumentTypeSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'TaxDocumentType');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[0]) {
                continue;
            }

            $dataSeeder[] = [
                'name' => $data[0]
            ];
        }

        DB::table('taxDocumentTypes')->insert($dataSeeder);
    }
}
