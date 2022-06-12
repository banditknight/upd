<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderProcessTechnicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderProcessTechnicals', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('tenderId');

            $table->bigInteger('tenderRequirementDocumentId');
            $table->bigInteger('attachment');

            $table->boolean('isDeleted')->default(false);

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
        Schema::dropIfExists('tenderProcessTechnicals');
    }
}
