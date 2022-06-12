<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldOfStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fieldOfStudies', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->string('name');
            $table->unsignedBigInteger('educationId');
            $table->foreign('educationId')->references('id')->on('education');

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
        Schema::dropIfExists('fieldOfStudies');
    }
}
