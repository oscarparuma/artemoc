<?php

use Illuminate\Database\Seeder;

class ARLTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('arl')->insert([
			['id' => 1, 'nombre' => "ARL no registrada"],
            ['id' => 2, 'nombre' => "ARL SEGUROS DE VIDA COLPATRIA S.A."],
            ['id' => 3, 'nombre' => "COMPAÑÍA DE SEGUROS BOLÍVAR S.A"],
            ['id' => 4, 'nombre' => "SEGUROS DE VIDA AURORA S.A."],
            ['id' => 5, 'nombre' => "SEGUROS DE VIDA ALFA S.A."],
            ['id' => 6, 'nombre' => "LIBERTY SEGUROS DE VIDA S.A."],
            ['id' => 7, 'nombre' => "POSITIVA COMPAÑÍA DE SEGUROS"],
            ['id' => 8, 'nombre' => "COLMENA RIESGOS PROFESIONALES"],
            ['id' => 9, 'nombre' => "ARL SURA"],
            ['id' => 10, 'nombre' => "LA EQUIDAD SEGUROS DE VIDA"],
            ['id' => 11, 'nombre' => "MAPFRE COLOMBIA VIDA SEGUROS S.A."],
            ['id' => 12, 'nombre' => "COMPAÑÍA AGRÍCOLA DE SEGUROS DE VIDA S.A."],
            ['id' => 13, 'nombre' => "SEGUROS DE VIDA DEL ESTADO S.A."],
            ['id' => 14, 'nombre' => "LA PREVISORA VIDA S.A. COMPAÑÍA DE SEGUROS"],
            ['id' => 15, 'nombre' => "ASEGURADORA DE VIDA COLSEGUROS S.A."],
            ['id' => 16, 'nombre' => "BBVA SEGUROS DE VIDA S.A."],
		]);
    }
}
