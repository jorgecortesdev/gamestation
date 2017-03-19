<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_client', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('children_id')->default(0)->unsigned()->index();
            $table->foreign('children_id')->references('id')->on('childrens')->onDelete('cascade');

            $table->integer('client_id')->default(0)->unsigned()->index();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children_client');
    }
}
