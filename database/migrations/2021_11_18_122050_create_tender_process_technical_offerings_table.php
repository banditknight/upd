<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderProcessTechnicalOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderProcessTechnicalOfferings', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('tenderId');

            $table->string('number');

            $table->bigInteger('fromDate');
            $table->bigInteger('toDate');

            $table->bigInteger('bidAttachment');
            $table->bigInteger('handOverInDay');

            $table->text('note');

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
        Schema::dropIfExists('tenderProcessTechnicalOfferings');
    }
}
