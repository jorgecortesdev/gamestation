<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductTypesTableAddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_types', function (Blueprint $table) {
            $table->foreign('product_id')
                  ->references('id')
                  ->on('products');

            $table->foreign('render_type_id')
                  ->references('id')
                  ->on('render_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_types', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['render_type_id']);
        });
    }
}
