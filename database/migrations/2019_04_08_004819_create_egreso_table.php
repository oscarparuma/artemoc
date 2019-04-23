<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEgresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egreso', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor', 12, 2);
            $table->date('pago_desde');
            $table->date('pago_hasta');
            $table->date('fecha_pago');
            $table->string('descripcion', 45);
            $table->string('observaciones', 250)->nullable();
            $table->integer('rubro_id')->unsigned();
            $table->foreign('rubro_id')->references('id')->on('rubro');
            $table->integer('colaborador_id')->unsigned()->nullable();
            $table->foreign('colaborador_id')->references('id')->on('colaborador');
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
        Schema::dropIfExists('egreso');
    }
}
