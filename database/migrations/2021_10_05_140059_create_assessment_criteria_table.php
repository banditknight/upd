<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessmentCriteria', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId')->nullable();
            $table->bigInteger('tenderItemId')->nullable();

            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('weight');

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
        Schema::dropIfExists('assessmentCriteria');
    }
}
