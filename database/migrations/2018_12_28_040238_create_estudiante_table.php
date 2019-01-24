<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nombre', 45);
			$table->string('apellido', 45);
			$table->integer('tipo_documento_id')->unsigned();
			$table->foreign('tipo_documento_id')->references('id')->on('tipo_documento');
			$table->string('numero_documento', 45);
			$table->integer('eps_id')->unsigned();
			$table->foreign('eps_id')->references('id')->on('eps');
			$table->integer('edad');
			$table->date('fecha_nacimiento');
			$table->string('curso', 45);
			$table->integer('colegio_id')->unsigned();
			$table->foreign('colegio_id')->references('id')->on('colegio');
			$table->string('grupo_sanguineo', 2);
			$table->char('factor_rh', 1);
			$table->string('observaciones', 100);
			$table->string('lugar_nacimiento', 45);
			$table->string('temas_interes', 100);
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
        Schema::dropIfExists('estudiante');
    }
}
