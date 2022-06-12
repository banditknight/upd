<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestForQuotations', function (Blueprint $table) {
            $table->id();

            $table->string('number');
            $table->string('name');

            $table->text('deliveryLocation');
            $table->bigInteger('incotermId');

            $table->bigInteger('purchasingGroupId');
            $table->bigInteger('purchasingOrganizationId');

            $table->string('lingkupPekerjaan')->nullable();
            $table->bigInteger('scopeOfWorkId')->nullable();

            $table->bigInteger('approvalDate')->nullable();
            $table->bigInteger('dateRequired')->nullable();

            $table->bigInteger('sectorId')->nullable();

            $table->text('noteForVendor')->nullable();
            $table->string('marking')->nullable();

            $table->bigInteger('projectId')->nullable();

            $table->integer('docStatusId')->default(1);
            $table->bigInteger('buyerId');

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
        Schema::dropIfExists('requestForQuotations');
    }
}
