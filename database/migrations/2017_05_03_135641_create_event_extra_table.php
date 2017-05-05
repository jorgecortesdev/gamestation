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

            $table->integer('event_id')->default(0)->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->integer('extra_id')->default(0)->unsigned()->index();
            $table->foreign('extra_id')->references('id')->on('extras')->onDelete('cascade');

            $table->integer('quantity')->default(1)->unsigned()->index();
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
