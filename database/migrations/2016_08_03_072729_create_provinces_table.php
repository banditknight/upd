<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('volt.indonesia.table_prefix').'provinces', function (Blueprint $table) {
            $table->char('id', 2);
            $table->string('name', 255);
            $table->text('meta')->nullable();
            $table->primary('id');
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
        // Schema::drop(config('volt.indonesia.table_prefix').'provinces');
    }
}
