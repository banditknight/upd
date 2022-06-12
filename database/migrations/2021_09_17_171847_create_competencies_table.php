<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('businessTypeId');
            $table->bigInteger('subBusinessTypeId');
            $table->text('descriptionOfExperience');
            $table->bigInteger('vendorTypeId');

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
        Schema::dropIfExists('competencies');
    }
}
