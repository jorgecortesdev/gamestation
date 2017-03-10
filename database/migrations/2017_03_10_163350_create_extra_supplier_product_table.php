<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraSupplierProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_supplier_product', function (Blueprint $table) {
           $table->increments('id');

            $table->integer('extra_id')->default(0)->unsigned()->index();
            $table->foreign('extra_id')->references('id')->on('combos')->onDelete('cascade');

            $table->integer('supplier_product_id')->default(0)->unsigned()->index();
            $table->foreign('supplier_product_id')->references('id')->on('supplier_products')->onDelete('cascade');

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
        Schema::dropIfExists('extra_supplier_product');
    }
}
