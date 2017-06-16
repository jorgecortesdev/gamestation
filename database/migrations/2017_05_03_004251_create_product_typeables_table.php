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
            $table->increments('id');

            $table->unsignedInteger('product_type_id')->index();

            $table->unsignedInteger('entity_id')->index();
            $table->string('entity_type', 50);

            $table->unsignedInteger('quantity')->default(1);

            $table->foreign('product_type_id')
                  ->references('id')
                  ->on('product_types')
                  ->onDelete('cascade');
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
