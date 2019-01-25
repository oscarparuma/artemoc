<?php

use Illuminate\Database\Seeder;

class NivelEscolaridadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel_escolaridad')->insert([
			['id' => 1, 'nombre' => "Nivel de escolaridad no registrado"],
            ['id' => 2, 'nombre' => "Primaria"],
            ['id' => 3, 'nombre' => "Bachillerato"],
            ['id' => 4, 'nombre' => "Técnico"],
            ['id' => 5, 'nombre' => "Tecnólogo"],
            ['id' => 6, 'nombre' => "Universitario en curso"],
            ['id' => 7, 'nombre' => "Profesional"],
            ['id' => 8, 'nombre' => "Especialización"],
            ['id' => 9, 'nombre' => "Maestría"],
            ['id' => 10, 'nombre' => "Doctorado"],
		]);
    }
}
