<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoColaboradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_colaborador', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('colaborador_id')->unsigned();
            $table->foreign('colaborador_id')->references('id')->on('colaborador');
            $table->integer('tipo_contrato_id')->unsigned();
            $table->foreign('tipo_contrato_id')->references('id')->on('tipo_contrato');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('salario');
            $table->integer('servicio_id')->unsigned()->nullable();
            $table->foreign('servicio_id')->references('id')->on('servicio');
            $table->string('observaciones', 250);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('dias', 15);
			$table->char('estado', 1)->default('A');
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
        Schema::dropIfExists('contrato_colaborador');
    }
}
