<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForQuotationResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rfqResponses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfqId');
            $table->foreign('rfqId')->references('id')->on('requestForQuotations');

            $table->unsignedBigInteger('invitedVendorId');
            $table->foreign('invitedVendorId')->references('id')->on('vendors');

            $table->unsignedBigInteger('rfqItemId');
            $table->foreign('rfqItemId')->references('id')->on('requestForQuotationItems');

            $table->integer('dateStart');
            $table->integer('dateEnd');

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
        Schema::dropIfExists('rfqResponses');
    }
}
