<?php

namespace Database\Seeders;

use App\Traits\DateTrait;
use App\Traits\ExcelReader;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenderScheduleSeeder extends Seeder
{
    use ExcelReader, DateTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TenderSchedule tenderSchedules
        $dataOnSheets = $this->read(storage_path('seeders/TenderSeeder.xlsx'), 'TenderSchedule');

        $dataSeeder = [];
        foreach ($dataOnSheets as $key => $data) {
            if ($key === 0) {
                continue;
            }

            // $dataSeeder[] = [
            //     'tenderId' => $data[0],
            //     'fromDate' => $this->dateToTimestamp($data[1]),
            //     'toDate' => Carbon::now()->addDays(30)->timestamp,
            //     'registrationFromDate' => $this->dateToTimestamp($data[3]),
            //     'registrationToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'preQualificationFromDate' => $this->dateToTimestamp($data[5]),
            //     'preQualificationToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'downloadDocumentTenderFromDate' => $this->dateToTimestamp($data[7]),
            //     'downloadDocumentTenderToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'aanwijzingFromDate' => $this->dateToTimestamp($data[9]),
            //     'aanwijzingToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'tenderFromDate' => $this->dateToTimestamp($data[11]),
            //     'tenderToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'bidOpeningFromDate' => $this->dateToTimestamp($data[13]),
            //     'bidOpeningToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'clarificationFromDate' => $this->dateToTimestamp($data[15]),
            //     'clarificationToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'auctionFromDate' => $this->dateToTimestamp($data[17]),
            //     'auctionToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'listOfWinnerFromDate' => $this->dateToTimestamp($data[19]),
            //     'listOfWinnerToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'approvalListOfWinnerFromDate' => $this->dateToTimestamp($data[21]),
            //     'approvalListOfWinnerToDate' => Carbon::now()->addDays(15)->timestamp,
            //     'objectionFromDate' => $this->dateToTimestamp($data[23]),
            //     'objectionToDate' => Carbon::now()->addDays(15)->timestamp,
            // ];

            $dataSeeder[] = [
                'tenderId' => $data[0],
                'fromDate' => Carbon::now()->timestamp,
                'toDate' => $this->tomorrow(30),
                'registrationFromDate' => Carbon::now()->timestamp,
                'registrationToDate' => $this->tomorrow(5),
                'preQualificationFromDate' => $this->tomorrow(6),
                'preQualificationToDate' => $this->tomorrow(12),
                'downloadDocumentTenderFromDate' => $this->tomorrow(1),
                'downloadDocumentTenderToDate' => $this->tomorrow(12),
                'aanwijzingFromDate' => $this->tomorrow(13),
                'aanwijzingToDate' => $this->tomorrow(14),
                'tenderFromDate' => $this->tomorrow(15),
                'tenderToDate' => $this->tomorrow(20),
                'bidOpeningFromDate' => $this->tomorrow(21),
                'bidOpeningToDate' => $this->tomorrow(25),
                'clarificationFromDate' => $this->tomorrow(26),
                'clarificationToDate' => $this->tomorrow(30),
                'auctionFromDate' => $this->tomorrow(21),
                'auctionToDate' => $this->tomorrow(25),
                'listOfWinnerFromDate' => $this->tomorrow(31),
                'listOfWinnerToDate' => $this->tomorrow(33),
                'approvalListOfWinnerFromDate' => $this->tomorrow(32),
                'approvalListOfWinnerToDate' => $this->tomorrow(32),
                'objectionFromDate' => $this->tomorrow(32),
                'objectionToDate' => $this->tomorrow(33),
            ];

        }

        DB::table('tenderSchedules')->insert($dataSeeder);

    }

    function tomorrow($n){
        return Carbon::now()->addDays($n)->timestamp;
    }
}
