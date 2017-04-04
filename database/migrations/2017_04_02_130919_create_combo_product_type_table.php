<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboProductTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_product_type', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('combo_id')->default(0)->unsigned()->index();
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');

            $table->integer('product_type_id')->default(0)->unsigned()->index();
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('cascade');

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
        Schema::dropIfExists('combo_product_type');
    }
}
