<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('domainId');
            $table->bigInteger('companyTypeId');
            $table->string('registrationNumber')->nullable()->unique();
            $table->string('name');
            $table->bigInteger('vendorTypeInformation');
            $table->string('presidentDirectorName');
            $table->string('referenceId')->nullable();

            $table->string('address');
            $table->string('secondAddress')->nullable();
            $table->bigInteger('countryId');
            $table->bigInteger('provinceId')->nullable();
            $table->bigInteger('cityId')->nullable();
            $table->bigInteger('districtId')->nullable();
            $table->string('postalCode');
            $table->string('phone')->unique();
            $table->string('phoneExt')->nullable();
            $table->string('faxMailNumber')->nullable();
            $table->string('faxMailNumberExt')->nullable();
            $table->string('email')->unique();
            $table->string('website')->nullable();

            $table->bigInteger('picId')->nullable();
            $table->string('picFullName');
            $table->string('picMobileNumber')->unique();
            $table->string('picEmail')->unique();

            $table->string('tenderReferenceNumber')->nullable();
            $table->string('pkpNumber')->nullable();
            $table->string('pkpAttachment')->nullable();
            $table->string('taxIdentificationNumber')->unique()->nullable();
            $table->string('taxIdentificationAttachment')->nullable();

            $table->boolean('isActive')->default(0);
            $table->boolean('isVendor')->default(1);
            $table->boolean('isCompleted')->default(0);
            $table->boolean('isAcceptTermAndCondition');

            $table->text('description')->nullable();
            $table->bigInteger('logo')->nullable();
            $table->tinyInteger('rating')->default(0);
            $table->integer('approvalStatus')->default(0); // 0 : Dokumen belum dikirim, 1 : Dokumen sudah dikirim, 2 : Dokumen sedang diperiksa, 3 : Dokumen accepted, 4 : Dokumen rejected. 5 : Dokumen expired

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
        Schema::dropIfExists('vendors');
    }
}
