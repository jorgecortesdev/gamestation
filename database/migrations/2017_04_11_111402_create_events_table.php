<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('occurs_on');
            $table->integer('combo_id')->default(0)->unsigned()->index();
            $table->integer('client_id')->default(0)->unsigned()->index();
            $table->integer('kid_id')->default(0)->unsigned()->index();
            $table->timestamps();

            $table->foreign('combo_id')
                  ->references('id')
                  ->on('combos');
            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients');
            $table->foreign('kid_id')
                  ->references('id')
                  ->on('kids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
