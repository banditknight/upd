<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderInvitedVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderInvitedVendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenderId');
            $table->foreign('tenderId')->references('id')->on('tenders');
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
        Schema::dropIfExists('tenderInvitedVendors');
    }
}
