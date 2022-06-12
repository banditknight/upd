<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderItemComponentCompliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderItemComponentComplies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('tenderId');

            $table->bigInteger('tenderItemId');
            $table->bigInteger('tenderItemComponentId')->nullable();
            $table->bigInteger('assessmentCriteriaItemId')->nullable();

            $table->bigInteger('score');

            $table->boolean('isComply');

            $table->text('comment')->nullable();

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
        Schema::dropIfExists('tenderItemComponentComplies');
    }
}
