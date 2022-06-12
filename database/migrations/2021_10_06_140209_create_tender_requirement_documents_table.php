<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderRequirementDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderRequirementDocuments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('stepType')->nullable();
            $table->boolean('isMandatory');
            $table->boolean('praQualification')->default(false);
            $table->boolean('technical')->default(false);
            $table->boolean('commercial')->default(false);
            $table->bigInteger('attachment');

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
        Schema::dropIfExists('tenderRequirementDocuments');
    }
}
