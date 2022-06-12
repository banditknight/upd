<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflowLogs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');

            $table->string('model');
            $table->bigInteger('mid');

            $table->string('transition');

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
        Schema::dropIfExists('workflowLogs');
    }
}
