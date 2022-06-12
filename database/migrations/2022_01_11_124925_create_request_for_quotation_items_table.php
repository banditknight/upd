<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestForQuotationItems', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('rfqId');

            $table->unsignedBigInteger('purchaseRequestItemId')->nullable();

            $table->bigInteger('productCodeId');
            $table->bigInteger('productGroupCodeId');

            $table->text('description')->nullable();

            $table->bigInteger('quantity');

            $table->bigInteger('unitOfMeasureId');

            $table->bigInteger('currencyId');

            $table->bigInteger('value');

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
        Schema::dropIfExists('requestForQuotationItems');
    }
}
