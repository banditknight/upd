<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('volt.indonesia.table_prefix').'villages', function (Blueprint $table) {
            $table->char('id', 10);
            $table->char('district_id', 7);
            $table->string('name', 255);
            $table->text('meta')->nullable();
            $table->primary('id');
            $table->timestamps();

            $table->foreign('district_id')
                ->references('id')
                ->on(config('volt.indonesia.table_prefix').'districts')
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
        // Schema::drop(config('volt.indonesia.table_prefix').'villages');
    }
}
