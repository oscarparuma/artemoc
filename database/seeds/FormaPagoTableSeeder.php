<?php

use Illuminate\Database\Seeder;

class FormaPagoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forma_pago')->insert([
			['id' => 1, 'nombre' => "Forma de pago no registrada"],
            ['id' => 2, 'nombre' => "Efectivo"],
            ['id' => 3, 'nombre' => "Consignación"],
            ['id' => 4, 'nombre' => "Tarjeta de crédito"],
            ['id' => 5, 'nombre' => "Tarjeta débito"],
            ['id' => 6, 'nombre' => "Transferencia"],

		]);
    }
}
