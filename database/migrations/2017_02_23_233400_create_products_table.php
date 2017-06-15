<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('quantity');
            $table->float('price', 8, 2);
            $table->boolean('iva')->default(false);
            $table->unsignedInteger('supplier_id')->index();
            $table->unsignedInteger('product_type_id')->index();
            $table->unsignedInteger('unity_id');
            $table->string('image')->default('');
            $table->timestamps();

            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('suppliers')
                  ->onDelete('cascade');

            $table->foreign('product_type_id')
                  ->references('id')
                  ->on('product_types')
                  ->onDelete('restrict');

            $table->foreign('unity_id')
                  ->references('id')
                  ->on('unities')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
