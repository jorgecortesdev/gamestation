<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraProductTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_product_type', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('extra_id')->default(0)->unsigned()->index();
            $table->foreign('extra_id')->references('id')->on('extras')->onDelete('cascade');

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
        Schema::dropIfExists('extra_product_type');
    }
}
