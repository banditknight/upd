<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowTransitionConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflowTranstionConditions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('workflowTransitionId');
            $table->integer('sequence');
            $table->string('seqJoinOperator'); // 0 = Or, 1 = And 
            $table->string('columnName'); // table column to check
            $table->string('checkOperation'); // sql operator for checking. =, != , <, <=, >, >=
            $table->string('checkValue'); // checked value

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
        Schema::dropIfExists('workflowTranstionConditions');
    }
}
