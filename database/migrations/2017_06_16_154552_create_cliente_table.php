<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Crear tabla clientes
        Schema::create('cliente', function(Blueprint $table){
            $table->increments('cliente_id');
            $table->string('cliente_nombre');
            $table->integer('cliente_cedula')->unique();
            $table->string('cliente_nit')->unique();
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
        // Eliminar tabla cliente
        Schema::drop('cliente');
    }
}
