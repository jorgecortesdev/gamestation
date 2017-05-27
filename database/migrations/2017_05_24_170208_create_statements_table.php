<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedInteger('amount')->default(0);
            $table->unsignedInteger('event_id')->index();

            $table->unsignedInteger('billable_id');
            $table->string('billable_type');

            $table->boolean('charge')->default(false);
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')
                ->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements');
    }
}
