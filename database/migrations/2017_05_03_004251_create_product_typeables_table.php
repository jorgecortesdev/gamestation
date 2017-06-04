<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_typeables', function (Blueprint $table) {
            $table->unsignedInteger('product_type_id');
            $table->foreign('product_type_id')
                  ->references('id')
                  ->on('product_types')
                  ->onDelete('cascade');

            $table->unsignedInteger('product_typeable_id');
            $table->string('product_typeable_type');

            $table->unsignedInteger('quantity')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_typeables');
    }
}
