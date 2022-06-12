<?php

namespace Database\Factories\v1;

use App\Models\v1\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    public function definition(): array
    {
    	return [
            'domainId' => 1,
            'companyTypeId' => 1,
            'name' => 'Kaltim Parna Industri',
            'registrationNumber' => '10000',
            'vendorTypeInformation' => 1,
            'presidentDirectorName' => 'BAPAK MARIHAD SIMON SIMBOLON',
            'referenceId' => 1,
            'address' => 'Jalan Pupuk Raya Km.2 RT.52 Kelurahan Loktuan Kecamatan Bontang Utara',
            'secondAddress' => 'Kota Bontang 75314 Kalimantan Timur',
            'countryId' => 1,
            'provinceId' => 64,
            'cityId' => 6474,
            'districtId' => 6474020,
            'postalCode' => 75314,
            'phone' => '+62-548 41717',
            'faxMailNumber' => '',
            'email' => 'eproc@kpi.co.id',
            'website' => 'https://www.kpi.co.id',
            'picId' => 1,
            'picFullName' => 'Procurement User',
            'picMobileNumber' => '08123456780',
            'picEmail' => 'eproc@kpi.co.id',
            'tenderReferenceNumber' => 1,
            'pkpNumber' => 1,
            'pkpAttachment' => 1,
            'isActive' => 1,
            'isCompleted' => 1,
            'taxIdentificationNumber' => '01.719.838.3052.000',
            'isAcceptTermAndCondition' => 1,
            'description' => 'Salah satu perusahaan Penanaman Modal Dalam Negeri (PMDN) terbesar yang memproduksi Anhydrous Ammonia di Indonesia.'
    	];
    }
}
