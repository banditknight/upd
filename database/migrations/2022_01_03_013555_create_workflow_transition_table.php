<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowTransitionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflowTransitions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('workflowNodeId');
            $table->bigInteger('workflowNextNodeId')->nullable();
            $table->integer('sequence');
            $table->string('description')->nullable();

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
        Schema::dropIfExists('workflowTransitions');
    }
}
