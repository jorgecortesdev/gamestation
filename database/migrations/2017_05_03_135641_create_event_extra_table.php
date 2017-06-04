<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_extra', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('event_id')->nullable()->default(null);
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');

            $table->unsignedInteger('extra_id')->nullable()->default(null);
            $table->foreign('extra_id')
                  ->references('id')
                  ->on('extras')
                  ->onDelete('cascade');

            $table->unsignedInteger('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_extra');
    }
}
