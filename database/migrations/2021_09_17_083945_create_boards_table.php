<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('boardTypeId');
            $table->bigInteger('nationalityId');
            $table->boolean('isListed');
            $table->boolean('isCompanyHead');
            $table->string('name');
            $table->string('position');

            $table->string('taxIdentificationNumber')->unique();
            $table->string('taxIdentificationAttachment');

            $table->string('ktpNumber')->unique()->nullable();
            $table->string('ktpAttachment')->nullable();

            $table->string('kitasNumber')->unique()->nullable();
            $table->string('kitasAttachment')->nullable();

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
        Schema::dropIfExists('boards');
    }
}
