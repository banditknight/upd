<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseRequestItems', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('purchaseRequestId');

            $table->unsignedBigInteger('PRItemId');
            $table->string('catItemNo');
            $table->string('materialNo')->nullable();
            $table->text('description')->nullable();
            $table->float('qty');
            $table->string('uom');
            $table->decimal('estimationUnitCost',15,3);
            $table->text('remarks')->nullable();
            $table->boolean('isService')->default(false);

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
        Schema::dropIfExists('purchaseRequestItems');
    }
}
