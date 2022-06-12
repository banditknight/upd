<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderProcessCommercialOfferingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderProcessCommercialOfferings', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('tenderId');

            $table->string('number');
            $table->bigInteger('fromDate');
            $table->bigInteger('toDate');
            $table->bigInteger('bidAttachment');
            $table->bigInteger('additionalCost');
            $table->text('note');

            $table->bigInteger('bidGuaranteeValue');
            $table->bigInteger('bidGuaranteeAttachment');
            $table->bigInteger('bidGuaranteeExpired');
            $table->bigInteger('incotermId');
            $table->text('incotermNote');

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
        Schema::dropIfExists('tenderProcessCommercialOfferings');
    }
}
