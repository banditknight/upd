<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->call([
            // ==== Reference Data ====
            AppKeySeeder::class,
            AppChannelSeeder::class,
            DocStatusSeeder::class,

            // ==== Master Data ====
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
            CountrySeeder::class,
            StateSeeder::class,

            ScopeOfSupplySeeder::class,
            ScopeOfWorkSeeder::class,
            EmployeeStatusSeeder::class,

            RolesAndPermissionsSeeder::class,
            DomainSeeder::class,
            CompanyTypeSeeder::class,
            ReferenceSeeder::class,
            VendorTypeInformationSeeder::class,
            TenderTypeSeeder::class,
            PurchasingOrganizationSeeder::class,
            SectorSeeder::class,
            BidSubmissionMethodSeeder::class,
            UserManualSeeder::class,
            TermAndConditionSeeder::class,
            BusinessTypeSeeder::class,
            SubBusinessTypeSeeder::class,
            BankSeeder::class,
            CurrencySeeder::class,
            TaxDocumentTypeSeeder::class,
            DeedTypeSeeder::class,
            ToolTypeSeeder::class,
            EducationSeeder::class,
            FieldOfStudySeeder::class,
            WorkPeriodSeeder::class,
            CertificationTypeSeeder::class,
            NationalitySeeder::class,
            ToolOwnerTypeSeeder::class,
            FinancialReportSeeder::class,
            BusinessPermitTypeSeeder::class,

            MenuActionSeeder::class,
            TabGroupSeeder::class,
            TabSeeder::class,
            FieldTypeSeeder::class,
            FieldSeeder::class,
            WindowSeeder::class,
            MenuSeeder::class,
            RoleMenuSeeder::class,

            BoardTypeSeeder::class,
            SanctionTypeSeeder::class,
            PurchasingGroupSeeder::class,
            UnitOfMeasureSeeder::class,
            ProductGroupCodeSeeder::class,
            ProductCodeSeeder::class,
            DepartmentSeeder::class,
            VendorGroupClassificationSeeder::class,
            VendorGroupCategorySeeder::class,
            VendorGroupSeeder::class,
            TenderIncotermSeeder::class,
            JobTitleSeeder::class,


            // ===== Transactional Data =====
            // DeedSeeder::class,
            // ShareHolderSeeder::class,
            // BoardSeeder::class,
            // BusinessPermitSeeder::class,
            // ToolSeeder::class,
            // SanctionSeeder::class,
            // ExpiredDocumentSeeder::class,
            

            // EmployeeSeeder::class,
            // CompetencySeeder::class,
            // CertificationSeeder::class,
            // BankAccountSeeder::class,
            // FinancialStatementSeeder::class,
            // TaxDocumentSeeder::class,


            // PurchaseRequestSeeder::class,
            // PurchaseRequestItemSeeder::class,

            // WorkflowNodeSeeder::class,
            // WorkflowTransitionSeeder::class,
            // WorkflowTransitionConditionSeeder::class,
            // WorkflowSeeder::class,

            VendorSeeder::class,
            UsersTableSeeder::class,

            // TenderParticipantSeeder::class,
            // TenderTechnicalBidEvaluationSeeder::class,
            // TenderItemComplySeeder::class,
            // TenderDetailSeeder::class,
            // TenderDocumentSeeder::class,
            // TenderItemSeeder::class,
            // TenderRequirementDocumentSeeder::class,
            // TenderScheduleSeeder::class,
            // TenderAanwijzingsSeeder::class,
            // ExperienceSeeder::class,
            // AnnouncementVendorSeeder::class,
            // AnnouncementGeneralSeeder::class,
            // AssessmentCriteriaSeeder::class,
            // AssessmentCriteriaItemSeeder::class,
            // TenderJoinStatusSeeder::class,

            ]);
        }
    }
