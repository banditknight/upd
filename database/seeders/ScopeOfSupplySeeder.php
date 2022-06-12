<?php

namespace Database\Seeders;

use App\Models\v1\PurchasingGroup;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Exception;

class ScopeOfSupplySeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 100;
        // skip 0 since 0 is worksheet for purchasing group.
        for ($i = 1; $i <= $max; $i++) {
            $this->perWorkSheet($i);
        }
    }

    /**
     * @throws Exception
     */
    private function perWorkSheet(int $sheetIndex)
    {
        $dataOnSheets = $this->readWorkSheetByIndex(storage_path('seeders/ScopeOfSupply.xlsx'), $sheetIndex);

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if (!$data[0]) {
                continue;
            }

            $purchasingGroupCode = $data[3];
            $purchasingGroupObject = PurchasingGroup::where('code', '=', $purchasingGroupCode)->first();

            $reCheckFound = false;
            if (!$purchasingGroupObject) {

                $newPurchasingGroupCode = str_replace('D0', 'D', $purchasingGroupCode);

                $purchasingGroupObject = PurchasingGroup::where('code', '=', $newPurchasingGroupCode)->first();
                $reCheckFound = (bool)$purchasingGroupObject;
            }

            if (!$reCheckFound) {
                continue;
            }

            $dataSeeder[] = [
                'code' => $data[0],
                'name' => $data[1],
                'purchasingGroupId' => $purchasingGroupObject->id ?? null
            ];
        }

        DB::table('scopeOfSupplies')->insert($dataSeeder);
    }
}
