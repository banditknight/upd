<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflowNodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('workflowId');
            $table->string('code');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('comment')->nullable();
            $table->string('action'); // user choice
            $table->string('columnName')->nullable();
            $table->bigInteger('responsibleRoleId')->nullable();

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
        Schema::dropIfExists('workflowNodes');
    }
}
