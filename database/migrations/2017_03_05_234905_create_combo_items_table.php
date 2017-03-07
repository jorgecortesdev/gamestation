<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComboItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combo_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('combo_id')->default(0)->unsigned()->index();
            $table->integer('supplier_product_id')->default(0)->unsigned()->index();
            $table->integer('quantity')->default(1)->unsigned()->index();
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');
            $table->foreign('supplier_product_id')->references('id')->on('supplier_products')->onDelete('cascade');
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
        Schema::dropIfExists('combo_items');
    }
}
