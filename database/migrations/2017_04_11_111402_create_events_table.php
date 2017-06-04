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
            $table->unsignedInteger('combo_id')->nullable()->default(null);
            $table->unsignedInteger('client_id')->nullable()->default(null);
            $table->unsignedInteger('kid_id')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('combo_id')
                  ->references('id')
                  ->on('combos')
                  ->onDelete('restrict');

            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('restrict');

            $table->foreign('kid_id')
                  ->references('id')
                  ->on('kids')
                  ->onDelete('restrict');
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
