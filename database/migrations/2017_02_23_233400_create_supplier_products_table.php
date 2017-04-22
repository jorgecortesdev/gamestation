<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierProductsTable extends Migration
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
            $table->string('name');
            $table->integer('quantity')->default(0)->unsigned();
            $table->float('price', 9, 2)->default(0.00);
            $table->float('iva', 9, 2)->default(0.00);
            $table->integer('supplier_id')->unsigned()->index();
            $table->integer('product_type_id')->unsigned()->index();
            $table->integer('unity_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('suppliers')
                  ->onDelete('cascade');

            $table->foreign('product_type_id')
                  ->references('id')
                  ->on('product_types');

            $table->foreign('unity_id')
                  ->references('id')
                  ->on('unities');

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
