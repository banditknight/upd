<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderItemCompliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderItemComplies', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('tenderId');

            $table->bigInteger('tenderItemId');

            $table->boolean('isComply');

            $table->boolean('isTbe')->nullable();
            $table->boolean('isCbe')->nullable();

            $table->bigInteger('unitPrice')->nullable();
            $table->bigInteger('additionalCost')->nullable();
            $table->text('additionalCostDescription')->nullable();

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
        Schema::dropIfExists('tenderItemComplies');
    }
}
