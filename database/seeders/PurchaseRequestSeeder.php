<?php

namespace Database\Seeders;

use App\Models\v1\PurchaseRequest;
use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;

class PurchaseRequestSeeder extends Seeder
{
    use ExcelReader;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'PR');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'no' => $data[0],
                'name' => $data[1],
                'departmentid' => $data[2],
                'itemtypeid' => $data[3],
                'currencyid' => $data[4],
                'confirmeddate' => $data[5],
                'totalamount' => $data[6],
                'totalqty' => $data[7],
                'wono' => $data[0],
                'wotitle' => $data[1],
                'document' => $data[0],
            ];
        }

        DB::table('purchaseRequests')->insert($dataSeeder);

    }
}
