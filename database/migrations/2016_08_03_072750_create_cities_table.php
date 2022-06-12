<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('volt.indonesia.table_prefix').'cities', function (Blueprint $table) {
            $table->char('id', 4);
            $table->char('province_id', 2);
            $table->string('name', 255);
            $table->text('meta')->nullable();
            $table->primary('id');
            $table->timestamps();

            $table->foreign('province_id')
                ->references('id')
                ->on(config('volt.indonesia.table_prefix').'provinces')
                ->onUpdate('cascade')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop(config('volt.indonesia.table_prefix').'cities');
    }
}
