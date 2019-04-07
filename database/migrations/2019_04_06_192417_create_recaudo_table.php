<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecaudoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recaudo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes', 15);
            $table->char('estado', 2);
            $table->integer('valor_cancelado');
            $table->integer('saldo_por_pagar');
            $table->date('fecha_pago');
            $table->integer('servicio_estudiante_id')->unsigned();
            $table->foreign('servicio_estudiante_id')->references('id')->on('servicio_estudiante');
            $table->integer('forma_pago_id')->unsigned();
            $table->foreign('forma_pago_id')->references('id')->on('forma_pago');
            $table->string('ruta_soporte', 100)->nullable();
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
        Schema::dropIfExists('recaudo');
    }
}
