<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinancialStatementSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'FinancialStatement');

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
                'financialStatementDate' => $data[2],
                'financialReportId' => $data[3],
                'publicAccountantFullName' => $data[4],
                'year' => $data[5],
                'currencyId' => $data[6],
                'currentAssets' => $data[7],
                'nonCurrentAssets' => $data[8],
                'otherAssets' => $data[9],
                'currentPayable' => $data[10],
                'otherPayable' => $data[11],
                'paidInCapital' => $data[12],
                'retainedEarning' => $data[13],
                'annualRevenue' => $data[14],
                'attachment' => 1,
            ];
        }

        DB::table('financialStatements')->insert($dataSeeder);
    }
}
