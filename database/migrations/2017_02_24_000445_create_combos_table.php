<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('hours')->default(3)->unsigned();
            $table->tinyInteger('kids')->default(0)->unsigned();
            $table->tinyInteger('adults')->default(0)->unsigned();
            // External ID, google colors :D
            $table->tinyInteger('color_id')->default(8)->unsigned();
            $table->float('price', 9 ,2)->unsigned()->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos');
    }
}
