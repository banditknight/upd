<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();

            $table->string('icon')->nullable();
            $table->string('value');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('isParent');

            $table->bigInteger('parentId')->nullable();

            $table->bigInteger('menuActionId');
            $table->bigInteger('menuActionValue');

            $table->boolean('isActive');
            $table->integer('sequence');

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
        Schema::dropIfExists('menus');
    }
}
