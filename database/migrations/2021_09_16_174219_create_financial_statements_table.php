<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financialStatements', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->bigInteger('vendorId');
            $table->bigInteger('financialStatementDate');
            $table->bigInteger('financialReportId');
            $table->string('publicAccountantFullName');
            $table->bigInteger('year');
            $table->bigInteger('currencyId');

            $table->bigInteger('currentAssets');
            $table->bigInteger('nonCurrentAssets');
            $table->bigInteger('otherAssets');

            $table->bigInteger('currentPayable');
            $table->bigInteger('otherPayable');

            $table->bigInteger('paidInCapital');
            $table->bigInteger('retainedEarning');

            $table->bigInteger('annualRevenue');
            $table->bigInteger('attachment');

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
        Schema::dropIfExists('financialStatements');
    }
}
