<?php

use Illuminate\Database\Seeder;

class RubroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rubro')->insert([
			['id' => 1, 'nombre' => "Rubro no registrado"],
            ['id' => 2, 'nombre' => "Energía"],
            ['id' => 3, 'nombre' => "Acueducto y Alcantarillado"],
            ['id' => 4, 'nombre' => "Arriendo Local 203 Meridiano 13"],
            ['id' => 5, 'nombre' => "Internet y Telefonía Fija – Tigo"],
            ['id' => 6, 'nombre' => "Administración Local 203 – Meridiano 13"],
            ['id' => 7, 'nombre' => "Cuota crédito Banco Falabella"],
            ['id' => 8, 'nombre' => "Cuota crédito Bancolombia"],
            ['id' => 9, 'nombre' => "Pago a Colaboradores"],
            ['id' => 10, 'nombre' => "Publicidad y Mercadeo"],
            ['id' => 11, 'nombre' => "Aseo"],
            ['id' => 12, 'nombre' => "Cafetería"],
            ['id' => 13, 'nombre' => "Papelería"],
		]);
    }
}
