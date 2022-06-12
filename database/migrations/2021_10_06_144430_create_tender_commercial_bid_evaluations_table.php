<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderCommercialBidEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderCommercialBidEvaluations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');
            $table->string('criteriaCode');
            $table->string('criteriaName');

            $table->string('requirement');
            $table->string('weight');

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
        Schema::dropIfExists('tenderCommercialBidEvaluations');
    }
}
