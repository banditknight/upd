<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId')->nullable();
            $table->bigInteger('vendorId')->nullable();

            $table->bigInteger('businessTypeId');
            $table->bigInteger('subBusinessTypeId');

            $table->string('workPackageName');
            $table->string('workPackageLocation');
            $table->string('contactOwner');

            $table->text('address');
            $table->bigInteger('countryId');

            $table->bigInteger('provinceId');
            $table->bigInteger('cityId');
            $table->bigInteger('districtId');

            $table->string('postalCode');

            $table->string('contactPerson');
            $table->string('phoneNumber');
            $table->string('contactEmail')->nullable();

            $table->string('contractNumber');

            $table->bigInteger('validFromDate');
            $table->bigInteger('validThruDate');

            $table->bigInteger('currencyId');

            $table->bigInteger('contractValue');

            $table->bigInteger('contractHandOverLetterDate')->nullable();
            $table->bigInteger('contractHandOverLetterNumber')->nullable();
            $table->bigInteger('contractHandOverLetterAttachment')->nullable();

            $table->string('testimony')->nullable();
            $table->bigInteger('testimonyAttachment');

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
        Schema::dropIfExists('experiences');
    }
}
