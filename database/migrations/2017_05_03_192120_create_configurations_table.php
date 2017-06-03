<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('event_id')->unsigned()->index();
            $table->integer('configurable_id')->unsigned();
            $table->string('configurable_type');

            $table->integer('product_type_id')->nullable()->unsigned();
            $table->integer('product_id')->nullable()->unsigned();
            $table->string('custom')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
