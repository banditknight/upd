<?php

namespace Database\Seeders;

use App\Models\v1\Vendor;
use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $dataSeeder = [];
        // create owner company
        Vendor::factory()->create();

        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Vendor');

        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'domainId' => 1,
                'companyTypeId' => 1,
                'name' => $data[0],
                'registrationNumber' => $data[1],
                'vendorTypeInformation' => 1,
                'presidentDirectorName' => $data[2],
                'referenceId' => 1,
                'address' => $data[3],
                'secondAddress' => null,
                'countryId' => 1,
                'provinceId' => 31,
                'cityId' => 3174,
                'districtId' => 3174030,
                'postalCode' => 12140,
                'phone' => $data[4],
                'faxMailNumber' => $data[5],
                'website' => $data[6],
                'email' => $data[7],
                'picId' => 1,
                'picFullName' => $data[2],
                'picMobileNumber' => $data[4],
                'picEmail' => $data[7],
                'tenderReferenceNumber' => 1,
                'pkpNumber' => 1,
                'pkpAttachment' => 1,
                'isActive' => 1,
                'isVendor' => 1,
                'isCompleted' => 1,
                'taxIdentificationAttachment' => 1,
                'taxIdentificationNumber' => $data[8],
                'isAcceptTermAndCondition' => 1,
                'approvalStatus' => $data[9]
            ];
        }

        // $dataSeeder[] = [
        //     'domainId' => 1,
        //     'companyTypeId' => 1,
        //     'name' => 'Kaltim Parna Industri',
        //     'registrationNumber' => '10000',
        //     'vendorTypeInformation' => 1,
        //     'presidentDirectorName' => 'Presdir',
        //     'referenceId' => 1,
        //     'address' => '',
        //     'secondAddress' => null,
        //     'countryId' => 1,
        //     'provinceId' => 31,
        //     'cityId' => 3174,
        //     'districtId' => 3174030,
        //     'postalCode' => 12140,
        //     'phone' => '123456',
        //     'faxMailNumber' => '123456',
        //     'website' => 'www.kpi.co.id',
        //     'email' => 'admin@kpi.co.id',
        //     'picId' => 1,
        //     'picFullName' => '',
        //     'picMobileNumber' => '',
        //     'picEmail' => '',
        //     'tenderReferenceNumber' => 1,
        //     'pkpNumber' => 1,
        //     'pkpAttachment' => 1,
        //     'isActive' => 1,
        //     'isVendor' => 0,
        //     'isCompleted' => 1,
        //     'taxIdentificationAttachment' => 1,
        //     'taxIdentificationNumber' => '',
        //     'isAcceptTermAndCondition' => 1,
        //     'approvalStatus' => 3
        // ];

        DB::table('vendors')->insert($dataSeeder);
    }
}
