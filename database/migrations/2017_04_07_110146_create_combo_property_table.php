<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_property', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('combo_id')->default(0)->unsigned()->index();
            $table->foreign('combo_id')
                  ->references('id')
                  ->on('combos')
                  ->onDelete('cascade');

            $table->integer('property_id')->default(0)->unsigned()->index();
            $table->foreign('property_id')
                  ->references('id')
                  ->on('properties')
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
        Schema::dropIfExists('combo_property');
    }
}
