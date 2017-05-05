<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurables', function (Blueprint $table) {
            $table->integer('configuration_id')->unsigned()->index();
            $table->foreign('configuration_id')->references('id')->on('configurations')->onDelete('cascade');

            $table->integer('configurable_id')->unsigned()->index();
            $table->string('configurable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurables');
    }
}
