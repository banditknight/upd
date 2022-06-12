<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId')->nullable();
            $table->bigInteger('vendorId')->nullable();

            $table->string('method');
            $table->ipAddress('ipAddress');
            $table->string('token');
            $table->integer('action');
            $table->string('table')->nullable();
            $table->bigInteger('recordID')->nullable();

            $table->text('oldValue')->nullable();
            $table->text('newValue')->nullable();

            $table->text('content');

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
        Schema::dropIfExists('logs');
    }
}
