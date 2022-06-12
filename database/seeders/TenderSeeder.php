<?php

namespace Database\Seeders;

use App\Models\v1\Tender;
use Illuminate\Database\Seeder;
use App\Traits\ExcelReader;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TenderSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataOnSheets = $this->read(storage_path('seeders/Seeder.xlsx'), 'Tender');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            $dataSeeder[] = [
                'number' => $data[0],
                'name' => $data[1],
                'lingkupPekerjaan' => $data[2],
                'purchasingOrganizationId' => $data[3],
                'scopeOfWorkId' => $data[4],
                'tenderTypeId' => $data[5],
                'tenderDetailId' => $data[6],
                'bidSubmissionMethodId' => $data[7],
                'fromDate' => Carbon::createFromFormat('d-m-Y', $data[8])->timestamp,
                'toDate' => Carbon::createFromFormat('d-m-Y', $data[9])->timestamp,
                'registrationFromDate' => Carbon::createFromFormat('d-m-Y', $data[10])->timestamp,
                'registrationToDate' => Carbon::createFromFormat('d-m-Y', $data[11])->timestamp,
                'preQualificationFromDate' => Carbon::createFromFormat('d-m-Y', $data[12])->timestamp,
                'preQualificationToDate' => Carbon::createFromFormat('d-m-Y', $data[13])->timestamp,
                'sectorId' => $data[14],
                'deliveryLocation' => 'Warehouse KPI Bontang',
                'purchasingGroupId' => 1,
                'incotermId' => 1,
                'isPreQualification' => 1,
                'isBidBond' => 0,
                'isEAuction' => 1,
                'isEAanwijzing' => 0,
                'docStatusId' => $data[15],
                'noteForVendor' => null,
                'buyerId' => 1,
                'tenderUserId' => 1,
            ];
        }

        DB::table('tenders')->insert($dataSeeder);
    }
}
