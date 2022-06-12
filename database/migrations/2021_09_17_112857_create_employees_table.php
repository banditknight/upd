<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('employeeStatusId');
            $table->bigInteger('dob');
            $table->string('pob');
            $table->string('name');
            $table->bigInteger('educationId');
            $table->bigInteger('fieldOfStudyId');
            $table->string('ktpNumber')->unique();
            $table->string('jobExperienceAttachment');
            $table->bigInteger('workPeriodId');
            $table->string('certificateAttachment');
            $table->bigInteger('certificateTypeId');

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
        Schema::dropIfExists('employees');
    }
}
