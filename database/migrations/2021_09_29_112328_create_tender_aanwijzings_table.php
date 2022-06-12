<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderAanwijzingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderAanwijzings', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');

            $table->string('eventName');
            $table->string('venue');
            $table->bigInteger('from');
            $table->bigInteger('to');

            $table->bigInteger('stateId');

            $table->text('note')->nullable();

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
        Schema::dropIfExists('tenderAanwijzings');
    }
}
