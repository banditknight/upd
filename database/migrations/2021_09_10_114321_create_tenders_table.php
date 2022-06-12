<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->string('name');

            $table->text('deliveryLocation');

            $table->bigInteger('purchasingGroupId');
            $table->bigInteger('purchasingOrganizationId');
            $table->bigInteger('incotermId');

            $table->bigInteger('scopeOfWorkId')->nullable();
            $table->string('lingkupPekerjaan')->nullable();

            $table->bigInteger('tenderTypeId');
            $table->bigInteger('tenderDetailId')->nullable();
            $table->bigInteger('bidSubmissionMethodId');

            $table->bigInteger('fromDate')->nullable();
            $table->bigInteger('toDate')->nullable();

            $table->bigInteger('registrationFromDate')->nullable();
            $table->bigInteger('registrationToDate')->nullable();

            $table->boolean('isPreQualification');
            $table->bigInteger('preQualificationFromDate')->nullable();
            $table->bigInteger('preQualificationToDate')->nullable();

            $table->boolean('isBidBond');
            $table->boolean('isEAuction');
            $table->boolean('isEAanwijzing');

            $table->text('noteForVendor')->nullable();

            $table->bigInteger('sectorId')->nullable();

            $table->string('marking')->nullable();
            $table->string('currentPlace')->nullable();
            $table->bigInteger('projectId')->nullable();

            $table->integer('tenderStatusId')->default(1);
            $table->integer('docStatusId')->default(1);

            $table->bigInteger('buyerId');
            $table->bigInteger('tenderUserId');

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
        Schema::dropIfExists('tenders');
    }
}
