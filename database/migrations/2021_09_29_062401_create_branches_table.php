<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');

            $table->string('name');
            $table->text('address');

            $table->bigInteger('countryId');
            $table->string('postalCode');

            $table->string('phone')->unique();
            $table->string('phoneExt')->nullable();

            $table->string('faxMailNumber')->unique();
            $table->string('faxMailNumberExt')->nullable();

            $table->string('email')->unique();
            $table->string('website')->nullable();

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
        Schema::dropIfExists('branches');
    }
}
