<?php

namespace Database\Seeders;

use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Equipments');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'userId' => $data[0],
                'vendorId' => $data[1],
                'total' => $data[2],
                'description' => $data[3],
                'capacity' => $data[4],
                'brand' => $data[5],
                'isNew' => $data[6],
                'location' => $data[7],
                'toolTypeId' => $data[9],
                'toolOwnerTypeId' => $data[10],
                'attachment' => $data[11],
            ];
        }

        DB::table('tools')->insert($dataSeeder);
    }
}
