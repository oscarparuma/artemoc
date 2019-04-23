<?php

use Illuminate\Database\Seeder;

class TipoContratoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_contrato')->insert([
			['id' => 1, 'nombre' => "Tipo de contrato no registrado"],
            ['id' => 2, 'nombre' => "Contrato a Término Indefinido"],
            ['id' => 3, 'nombre' => "Contrato de Obra o Labor"],
            ['id' => 4, 'nombre' => "Contrato para la Formación y el Aprendizaje"],
            ['id' => 5, 'nombre' => "Contrato Temporal, Ocasional o Transitorio"],
            ['id' => 6, 'nombre' => "Contrato Civil por Prestación de Servicios"],
            ['id' => 7, 'nombre' => "Contrato a Término Fijo"],
            ['id' => 8, 'nombre' => "Contrato en Prácticas"],
            ['id' => 9, 'nombre' => "Contrato por Horas"],
		]);
    }
}
