<?php

use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documento')->insert([
			['id' => 1, 'nombre' => "Tarjeta de Identidad"],
			['id' => 2, 'nombre' => "NUIP"],
			['id' => 3, 'nombre' => "Registro Civil"],
			['id' => 4, 'nombre' => "Cédula de Ciudadanía"],
			['id' => 5, 'nombre' => "Cédula de Extranjería"],
			['id' => 6, 'nombre' => "Pasaporte"],
		]);
    }
}
