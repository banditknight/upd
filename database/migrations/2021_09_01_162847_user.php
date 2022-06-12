<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', static function(Blueprint $blueprint) {
            $blueprint->increments('id');
            $blueprint->string('code')->unique();
            $blueprint->string('name');
            $blueprint->string('address')->nullable();
            $blueprint->string('phone')->unique();
            $blueprint->string('email')->unique();
            $blueprint->string('password');

            $blueprint->unsignedBigInteger('vendorId');
            $blueprint->bigInteger('departmentId')->nullable();
            
            $blueprint->dateTime('createdAt')->nullable();
            $blueprint->dateTime('updatedAt')->nullable();
            $blueprint->boolean('isPrimary')->nullable();
            $blueprint->boolean('isActive')->default(true);
            $blueprint->bigInteger('attachment')->nullable();

            $blueprint->bigInteger('jobTitleId')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
