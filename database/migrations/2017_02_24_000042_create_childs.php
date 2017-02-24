<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0)->unsigned()->index();
            $table->string('name');
            $table->integer('age')->default(0)->unsigned();
            $table->tinyInteger('sex')->default(0)->unsigned();
            $table->date('birthday');
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
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
        Schema::dropIfExists('childs');
    }
}
