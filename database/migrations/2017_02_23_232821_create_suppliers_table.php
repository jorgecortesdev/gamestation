<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('telephone');
            $table->string('email');
            $table->integer('supplier_type_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('supplier_type_id')
                  ->references('id')
                  ->on('supplier_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}


/**
 * Nombre
Dirección
Teléfono. Puede tener uno o más y debe tener tipo, ej.: celular, fax, oficina, casa, etc.
Tipo de proveedor. De servicio o de productos.

 */