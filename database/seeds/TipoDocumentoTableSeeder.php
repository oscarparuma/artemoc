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
			['id' => 4, 'nombre' => "C�dula de Ciudadan�a"],
			['id' => 5, 'nombre' => "C�dula de Extranjer�a"],
			['id' => 6, 'nombre' => "Pasaporte"],
		]);
    }
}
