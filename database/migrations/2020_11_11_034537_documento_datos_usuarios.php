<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DocumentoDatosUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos_datos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_apellidos')->nullable();
            $table->string('dni')->nullable();
            $table->string('codigo_colaborador')->nullable();
            $table->string('puesto_colaborador')->nullable();
            $table->string('area_colaborador')->nullable();
            $table->date('fecha_recepcion')->nullable();
            $table->text('firma')->nullable();
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
        Schema::dropIfExists('documentos_datos_usuarios');
    }
}
