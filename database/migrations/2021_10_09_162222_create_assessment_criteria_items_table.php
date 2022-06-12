<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentCriteriaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessmentCriteriaItems', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId')->nullable();
            $table->bigInteger('tenderItemId')->nullable();
            $table->bigInteger('assessmentCriteriaId')->nullable();

            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->bigInteger('point')->nullable();
            $table->bigInteger('parentId')->nullable();
            $table->boolean('isSummary')->nullable();

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
        Schema::dropIfExists('assessmentCriteriaItems');
    }
}
