<?php

use Illuminate\Database\Seeder;

class EPSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eps')->insert([
			['id' => 1, 'nombre' => "EPS no registrada"],
			['id' => 2, 'nombre' => "Aliansalud"],
			['id' => 3, 'nombre' => "Medimás"],
			['id' => 4, 'nombre' => "Capital Salud"],
			['id' => 5, 'nombre' => "Caprecom"],
			['id' => 6, 'nombre' => "Capresoca"],
			['id' => 7, 'nombre' => "Colmédica"],
			['id' => 8, 'nombre' => "Compensar"],
			['id' => 9, 'nombre' => "Coomeva EPS"],
			['id' => 10, 'nombre' => "Famisanar"],
			['id' => 11, 'nombre' => "Humana Vivir"],
			['id' => 12, 'nombre' => "Nueva EPS"],
			['id' => 13, 'nombre' => "Salud Colmena"],
			['id' => 14, 'nombre' => "Salud Colpatria"],
			['id' => 15, 'nombre' => "Salud Total"],
			['id' => 16, 'nombre' => "SaludCoop"],
			['id' => 17, 'nombre' => "Saludvida"],
			['id' => 18, 'nombre' => "Sanitas"],
			['id' => 19, 'nombre' => "Selvasalud"],
			['id' => 20, 'nombre' => "Solsalud"],
			['id' => 21, 'nombre' => "S.O.S EPS"],
			['id' => 22, 'nombre' => "Susalud"],
			['id' => 23, 'nombre' => "Médicos Asociados"],
			['id' => 24, 'nombre' => "Servisalud EPS"],
			['id' => 25, 'nombre' => "Cruz Blanca"],
		]);
    }
}
