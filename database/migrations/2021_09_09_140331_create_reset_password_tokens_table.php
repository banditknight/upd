<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResetPasswordTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resetPasswordTokens', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('userId');
            $table->string('token');
            $table->bigInteger('expired');
            $table->bigInteger('isActive')->default(1);

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
        Schema::dropIfExists('resetPasswordTokens');
    }
}
