<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcudienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acudiente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
			$table->string('apellido', 45);
			$table->integer('tipo_documento_id')->unsigned();
			$table->foreign('tipo_documento_id')->references('id')->on('tipo_documento');
			$table->string('numero_documento', 45);
			$table->string('direccion_residencia', 100);
            $table->string('direccion_oficina', 100);
            $table->string('telefono', 45);
            $table->bigInteger('celular');
            $table->string('ocupacion', 50);
            $table->string('correo_electronico', 45);
			$table->integer('nivel_escolaridad_id')->unsigned();
			$table->foreign('nivel_escolaridad_id')->references('id')->on('nivel_escolaridad');
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
        Schema::dropIfExists('acudiente');
    }
}
