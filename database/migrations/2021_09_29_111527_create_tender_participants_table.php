<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenderParticipants', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId');
            $table->bigInteger('userId');
            $table->bigInteger('vendorId');

            $table->bigInteger('tbeScore')->nullable();
            $table->bigInteger('cbeScore')->nullable();

            $table->bigInteger('ratioFinancial')->nullable();

            $table->bigInteger('joinStatusId')->default(3);

            // $table->boolean('accepted');
            $table->boolean('pq')->default(false);
            $table->boolean('aanwijzing')->default(false);
            $table->boolean('technical')->default(false);
            $table->boolean('commercial')->default(false);
            $table->boolean('win')->default(false);

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
        Schema::dropIfExists('tenderParticipants');
    }
}
