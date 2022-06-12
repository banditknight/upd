<?php

namespace App\Application\Transformers;

use App\Application\AbstractTransformer;
use App\Models\v1\AbstractModel;
use App\Models\v1\BankAccount;
use App\Models\v1\Board;
use App\Models\v1\BusinessPermit;
use App\Models\v1\Certification;
use App\Models\v1\City;
use App\Models\v1\Competency;
use App\Models\v1\Country;
use App\Models\v1\Deed;
use App\Models\v1\District;
use App\Models\v1\Employee;
use App\Models\v1\Experience;
use App\Models\v1\FinancialStatement;
use App\Models\v1\Province;
use App\Models\v1\ShareHolder;
use App\Models\v1\TaxDocument;
use App\Models\v1\Tool;
use App\Models\v1\User;
use App\Models\v1\Vendor;
use App\Models\v1\VendorTypeInformation;
use App\Traits\VendorStatusTrait;
use Illuminate\Database\Eloquent\Model;

class VendorTransformer extends AbstractTransformer
{
    use VendorStatusTrait;

    public function transform(AbstractModel $vendor)
    {
        // @ todo need to refactor this hardcoded data.
        return [
            'id' => $vendor->id,
            'name' => $vendor->name,
            'companyType' => $vendor->companyType,
            'presidentDirectorName' => $vendor->presidentDirectorName,
            'registrationNumber' => $vendor->registrationNumber,
            'email' => $vendor->email,
            'website' => $vendor->website,
            'phone' => $vendor->phone,
            'faxMailNumber' => $vendor->faxMailNumber,
            'picFullName' => $vendor->picFullName,
            'address' => $vendor->address,
            'vendorTypeInformation' => VendorTypeInformation::find($vendor->vendorTypeInformation, ['id', 'name']),
            'administrationData' => [
                'organization' => $this->statusDecider($vendor, new Vendor(), null),
                'legalBases' => $this->statusDecider($vendor, new Deed(), new Vendor()),
                'shareHolders' => $this->statusDecider($vendor, new ShareHolder(), new Deed()),
                'boards' => $this->statusDecider($vendor, new Board(), new ShareHolder()),
                'businessPermit' => $this->statusDecider($vendor, new BusinessPermit(), new Board()),
                'personInCharges' => $this->statusDecider($vendor, new User(), new BusinessPermit())
            ],
            'competenciesAndExperiences' => [
                'tools' => $this->statusDecider($vendor, new Tool(), new User()),
                'experts' => $this->statusDecider($vendor, new Employee(), new Tool()),
                'certifications' => $this->statusDecider($vendor, new Certification(), new Employee()),
                'competencies' => $this->statusDecider($vendor, new Competency(), new Certification()),
                'portfolios' => $this->statusDecider($vendor, new Experience(), new Competency())
            ],
            'financial' => [
                'bankAccount' => $this->statusDecider($vendor, new BankAccount(), new Experience()),
                'financialStatements' => $this->statusDecider($vendor, new FinancialStatement, new BankAccount()),
                'taxDocuments' => $this->statusDecider($vendor, new TaxDocument, new FinancialStatement)
            ],
            'country' => Country::find($vendor->countryId, ['id', 'name']),
            'province' => Province::find($vendor->provinceId, ['id', 'name']),
            'city' => City::find($vendor->cityId, ['id', 'name']),
            'district' => District::find($vendor->districtId, ['id', 'name']),
            'postalCode' => $vendor->postalCode,
            'status' => $this->vendorStatus($vendor),
            'approvalStatus' => $this->approvalStatus($vendor->approvalStatus),
            'description' => $vendor->description,
            'liquidity' => $vendor->liquidity,
            'competency' => $vendor->competency,
            'rating' => $vendor->rating,
            'logo' => $vendor->logo,
            'taxNumber' => $vendor->taxIdentificationNumber,
            'taxDocument' => $vendor->taxIdentificationAttachment
        ];
    }

    private function statusDecider($vendor, $currentModel, $previousModel)
    {
        $hasPrevious = true;

        if ($previousModel instanceof Model) {
            $hasPrevious = $previousModel instanceof Vendor ?
                $vendor :
                $previousModel::where('vendorId', '=', $vendor->id)->first();
        }

        $statusCode = 'DISABLED';

        if ($hasPrevious) {
            $hasCurrent = $currentModel instanceof Vendor ?
                $vendor :
                $currentModel::where('vendorId', '=', $vendor->id)->first();

            $statusCode = $hasCurrent ? 'COMPLETED' : 'OPEN';
        }

        return [
            'status' => [
                'code' => $statusCode,
                'title' => __('status.' . $statusCode)
            ]
        ];
    }
}
