<?php

namespace App\Traits;

use App\Models\v1\AbstractModel;
use App\Models\v1\Sanction;
use App\Models\v1\SanctionType;
use App\Models\v1\Vendor;

trait VendorStatusTrait
{

    public function approvalStatus($astatus){
        $st = 'noDocs';

        switch($astatus){
            case 0:
                $st = 'noDocs';
                break;
            case 1:
                $st = 'docsSubmitted';
                break;
            case 2:
                $st = 'docsChecking';
                break;
            case 3:
                $st = 'docsAccepted';
                break;
            case 4:
                $st = 'docsRejected';
                break;
            case 5:
                $st = 'docsExpired';
                break;
            default:
                $st = 'noDocs';
                break;
        }

        return $st;
    }

    public function vendorStatus(AbstractModel $vendor)
    {
        if (!$vendor instanceof Vendor) {
            return null;
        }

        $data = [
            'code' => '00',
            'name' => 'Active'
        ];

        $sanctions = Sanction::where('vendorId', '=', $vendor->id)->get();

        $calculatedSanctionScore = 0;
        foreach ($sanctions as $sanction) {
            /** @var SanctionType */
            $calculatedSanctionScore += $sanction && $sanction->sanctionType ? $sanction->sanctionType->score : 0;
        }

        if ($calculatedSanctionScore >= 60) {
            $data['code'] = '02';
            $data['name'] = 'Banned';
        }

        if ($calculatedSanctionScore >= 30 && $calculatedSanctionScore <= 60) {
            $data['code'] = '01';
            $data['name'] = 'Warning';
        }

        if (!$vendor->isActive) {
            $data = [
                'code' => '04',
                'name' => 'Inactive'
            ];
        }

        return $data;
    }

    public function vendorCanJoinTender(AbstractModel $vendor)
    {
        if (!$vendor instanceof Vendor) {
            return null;
        }

        $isComplete = $vendor
            ->select([
                'deeds.id AS deedId',
                'shareHolders.id AS shareHolderId',
                'boards.id AS boardId',
                'businessPermits.id AS businessPermitId',
                'users.id AS userId',

                'competencies.id AS competencyId',
                'certifications.id AS certificationId',
                'tools.id AS toolId',
                'employees.id AS employeeId',
                'experiences.id AS experienceId',

                'bankAccounts.id AS bankAccountId',
                'financialStatements.id AS financialStatementId',
                'taxDocuments.id AS taxDocumentId',
            ])
            // Administrator Data.
            ->join('deeds', 'deeds.vendorId', '=', 'vendors.id')
            ->join('shareHolders', 'shareHolders.vendorId', '=', 'vendors.id')
            ->join('boards', 'boards.vendorId', '=', 'vendors.id')
            ->join('businessPermits', 'businessPermits.vendorId', '=', 'vendors.id')
            ->join('users', 'users.vendorId', '=', 'vendors.id')

            // Competency and Experience
            ->join('competencies', 'competencies.vendorId', '=', 'vendors.id')
            ->join('certifications', 'certifications.vendorId', '=', 'vendors.id')
            ->join('tools', 'tools.vendorId', '=', 'vendors.id')
            ->join('employees', 'employees.vendorId', '=', 'vendors.id')
            ->join('experiences', 'experiences.vendorId', '=', 'vendors.id')

            // Financial
            ->join('bankAccounts', 'bankAccounts.vendorId', '=', 'vendors.id')
            ->join('financialStatements', 'financialStatements.vendorId', '=', 'vendors.id')
            ->join('taxDocuments', 'taxDocuments.vendorId', '=', 'vendors.id')
            ->limit(1)
        ;

        return (boolean)$isComplete->count();
    }
}
