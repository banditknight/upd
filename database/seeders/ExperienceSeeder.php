<?php

namespace Database\Seeders;

use App\Models\v1\Experience;
use App\Traits\ExcelReader;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperienceSeeder extends Seeder
{
    use ExcelReader;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience::factory()->create();

        $dataOnSheets = $this->read(storage_path('seeders/VendorProfileSeeder.xlsx'), 'Experience');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            if ($data[0] === null) {
                continue;
            }

            $dataSeeder[] = [
                'vendorId' => $data[0],
                'userId' => $data[1],
                'businessTypeId' => $data[2],
                'subBusinessTypeId' => $data[3],
                'workPackageName' => $data[4],
                'workPackageLocation' => $data[5],
                'contactOwner' => $data[6],
                'address' => $data[7],
                'countryId' => $data[8],
                'provinceId' => $data[9],
                'cityId' => $data[10],
                'districtId' => $data[11],
                'postalCode' => $data[12],
                'contactPerson' => $data[13],
                'phoneNumber' => $data[14],

                'contractNumber' => '1234567/NA/NI/NU',
                'validFromDate' => Carbon::now()->timestamp,
                'validThruDate' => Carbon::now()->timestamp,
                'currencyId' => 1,
                'contractValue' => 100000000,
                'contractHandOverLetterDate' => Carbon::now()->timestamp,
                'contractHandOverLetterNumber' => 12345,
                'contractHandOverLetterAttachment' => 1,
                'testimony' => "Testimony",
                'testimonyAttachment' => 1,
            ];
        }

        DB::table('experiences')->insert($dataSeeder);
    }
}
