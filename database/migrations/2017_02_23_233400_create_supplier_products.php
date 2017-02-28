<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->default(0)->unsigned()->index();
            $table->string('name');
            $table->integer('quantity')->unsigned();
            $table->integer('unity_id')->default(0)->unsigned()->index();
            $table->float('price', 9, 2)->default(0.00);
            $table->float('iva', 9, 2)->default(0.00);
            $table->integer('product_type_id')->default(0)->unsigned()->index();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->foreign('unity_id')->references('id')->on('unities');
            $table->foreign('product_type_id')->references('id')->on('product_types');
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
        Schema::dropIfExists('supplier_products');
    }
}
