<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderTechnicalBidEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderTechnicalBidEvaluations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');
            $table->bigInteger('tenderItemId');

            $table->bigInteger('assessmentCriteriaId');
//            $table->text('assessmentCriteriaItem');

            $table->string('requirement');
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
        Schema::dropIfExists('tenderTechnicalBidEvaluations');
    }
}
