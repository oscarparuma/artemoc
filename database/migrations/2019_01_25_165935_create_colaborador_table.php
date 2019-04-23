<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
			$table->string('apellido', 45);
			$table->integer('tipo_documento_id')->unsigned();
			$table->foreign('tipo_documento_id')->references('id')->on('tipo_documento');
			$table->string('numero_documento', 45);
            $table->string('profesion', 70);
            $table->string('telefono', 45)->nullable();
            $table->integer('celular');
            $table->string('correo_electronico', 45);
            $table->integer('eps_id')->unsigned();
            $table->foreign('eps_id')->references('id')->on('eps');
            $table->integer('arl_id')->unsigned();
            $table->foreign('arl_id')->references('id')->on('arl');
			$table->string('grupo_sanguineo', 2);
			$table->char('factor_rh', 1);
            $table->string('nombre_contacto_emergencia', 100);
            $table->string('telefono_contacto_emergencia', 45);
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
        Schema::dropIfExists('colaborador');
    }
}
