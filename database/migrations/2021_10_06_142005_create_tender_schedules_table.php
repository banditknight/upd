<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderSchedules', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');
            $table->bigInteger('fromDate');
            $table->bigInteger('toDate');

            $table->bigInteger('registrationFromDate');
            $table->bigInteger('registrationToDate');

            $table->bigInteger('preQualificationFromDate')->nullable();
            $table->bigInteger('preQualificationToDate')->nullable();

            $table->bigInteger('downloadDocumentTenderFromDate')->nullable();
            $table->bigInteger('downloadDocumentTenderToDate')->nullable();

            $table->bigInteger('aanwijzingFromDate')->nullable();
            $table->bigInteger('aanwijzingToDate')->nullable();

            $table->bigInteger('tenderFromDate')->nullable();
            $table->bigInteger('tenderToDate')->nullable();

            $table->bigInteger('bidOpeningFromDate')->nullable();
            $table->bigInteger('bidOpeningToDate')->nullable();

            $table->bigInteger('clarificationFromDate')->nullable();
            $table->bigInteger('clarificationToDate')->nullable();

            $table->bigInteger('auctionFromDate')->nullable();
            $table->bigInteger('auctionToDate')->nullable();

            $table->bigInteger('listOfWinnerFromDate')->nullable();
            $table->bigInteger('listOfWinnerToDate')->nullable();

            $table->bigInteger('approvalListOfWinnerFromDate')->nullable();
            $table->bigInteger('approvalListOfWinnerToDate')->nullable();

            $table->bigInteger('objectionFromDate')->nullable();
            $table->bigInteger('objectionToDate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenderSchedules');
    }
}
