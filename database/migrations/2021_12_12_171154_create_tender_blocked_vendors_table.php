<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderBlockedVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderBlockedVendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tenderId');
            $table->foreign('tenderId')->references('id')->on('tenders');
            $table->unsignedBigInteger('blockedVendorId');
            $table->foreign('blockedVendorId')->references('id')->on('vendors');
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
        Schema::dropIfExists('tenderBlockedVendors');
    }
}
