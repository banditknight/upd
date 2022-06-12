<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShareHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareHolders', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->string('name');
            $table->bigInteger('nationalityId');
            $table->bigInteger('sharePercentage');

            $table->bigInteger('taxIdentificationNumber')->unique()->nullable();
            $table->bigInteger('taxIdentificationAttachment')->nullable();
            $table->bigInteger('ktpNumber')->unique()->nullable();
            $table->bigInteger('ktpAttachment')->nullable();
            $table->bigInteger('kitasNumber')->unique()->nullable();
            $table->bigInteger('kitasAttachment')->nullable();

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
        Schema::dropIfExists('shareHolders');
    }
}
