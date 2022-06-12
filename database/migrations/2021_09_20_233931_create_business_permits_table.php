<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessPermits', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('businessPermitTypeId');

            $table->bigInteger('legalOrganizationScaleId')->nullable();

            $table->string('attachment');
            $table->string('number')->unique();
            $table->bigInteger('validFromDate');
            $table->bigInteger('validThruDate');
            $table->string('issuedBy');

            $table->text('otherBusinessPermitType')->nullable();

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
        Schema::dropIfExists('businessPermits');
    }
}
