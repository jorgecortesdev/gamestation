<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplies_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supply_id')->default(0)->unsigned()->index();
            $table->integer('product_id')->default(0)->unsigned()->index();
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('supplies_list');
    }
}
