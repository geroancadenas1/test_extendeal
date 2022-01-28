<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuadrosTable extends Migration
{
   
    public function up()
    {
        Schema::create('cuadros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 500);
            $table->string('autor', 100);
            $table->string('description', 600);
            $table->integer('anio_creacion');
            $table->integer('cod_museo');
            $table->integer('cod_registro');
            $table->float('costo');
            $table->string('status');
            $table->string('accion')->nullable();
            $table->float('tiempo_respuesta')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('cuadros');
    }
}
