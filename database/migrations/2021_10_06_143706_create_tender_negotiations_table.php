<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderNegotiationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderNegotiations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');
            $table->bigInteger('tenderItemId');

            $table->string('status');
            $table->string('initiatorName');

            $table->decimal('price',15,2);
            $table->decimal('additionalCost',15,2);

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
        Schema::dropIfExists('tenderNegotiations');
    }
}
