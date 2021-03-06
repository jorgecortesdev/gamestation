<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientKidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_kid', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('kid_id');
            $table->foreign('kid_id')
                  ->references('id')
                  ->on('kids')
                  ->onDelete('cascade');

            $table->unsignedInteger('client_id');
            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_kid');
    }
}
