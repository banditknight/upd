<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpiredDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expiredDocuments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('vendorId');

            $table->bigInteger('businessPermitTypeId');
            $table->bigInteger('businessPermitNumber');

            $table->bigInteger('validFromDate');
            $table->bigInteger('validThruDate');

            $table->bigInteger('stateId');

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
        Schema::dropIfExists('expiredDocuments');
    }
}
