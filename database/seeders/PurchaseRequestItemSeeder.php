<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\v1\PurchaseRequestItem;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class PurchaseRequestItemSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'PR Items');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'purchaseRequestId' => $data[0],
                'catItemNo' => $data[1],
                'materialNo' => $data[2],
                'description' => $data[3],
                'qty' => $data[4],
                'uom' => $data[5],
                'estimationUnitCost' => $data[6],
                'remarks' => $data[7],
                'isService' => $data[8],
                'PRItemId' => $data[9],
            ];
        }

        DB::table('purchaseRequestItems')->insert($dataSeeder);

    }
}
