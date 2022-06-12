<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseRequests', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('tenderId')->nullable();

            $table->string('no')->unique();
            $table->string('name');

            $table->bigInteger('departmentId');
            $table->bigInteger('itemTypeId');
            $table->bigInteger('currencyId');

            $table->string('woNo')->nullable();
            $table->string('woTitle')->nullable();
            $table->string('document')->nullable();


            $table->date('confirmedDate');
            $table->decimal('totalAmount',15,3);
            $table->float('totalQty');
            $table->bigInteger('DocStatusId')->default(1);

            $table->string('prType')->default('ERP');

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
        Schema::dropIfExists('purchaseRequests');
    }
}
