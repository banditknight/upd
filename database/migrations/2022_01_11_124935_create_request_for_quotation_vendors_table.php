<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForQuotationVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestForQuotationVendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfqId');
            $table->foreign('rfqId')->references('id')->on('requestForQuotations');
            $table->unsignedBigInteger('invitedVendorId');
            $table->foreign('invitedVendorId')->references('id')->on('vendors');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('requestForQuotationVendors');
    }
}
