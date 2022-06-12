<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //@TODO create all foreign key index here

        Schema::table('purchaseRequestItems', function (Blueprint $table) {
            $table->foreign('purchaseRequestId')->references('id')->on('purchaseRequests');
        });

        Schema::table('tenderItems', function (Blueprint $table) {
            $table->foreign('purchaseRequestItemId')->references('id')->on('purchaseRequestItems');
            // $table->foreignId('purchaseRequestItemId')->constrained('purchaseRequestItems');
        });        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('foreign_keys');
    }
}
