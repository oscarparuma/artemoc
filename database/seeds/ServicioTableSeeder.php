<?php

use Illuminate\Database\Seeder;

class ServicioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicio')->insert([
			['id' => 1, 'nombre' => "Club de tareas", 'tipo' => 'N'],
			['id' => 2, 'nombre' => "Asesoría pedagógica individual", 'tipo' => 'N'],
			['id' => 3, 'nombre' => "Valoración psicológica", 'tipo' => 'N'],
			['id' => 4, 'nombre' => "Terapia psicológica", 'tipo' => 'N'],
			['id' => 5, 'nombre' => "Orientación vocacional", 'tipo' => 'N'],
			['id' => 6, 'nombre' => "Orientación para padres", 'tipo' => 'N'],
			['id' => 7, 'nombre' => "Curso fin de semana para niños - Plastilina", 'tipo' => 'N'],
			['id' => 8, 'nombre' => "Curso fin de semana para niños - Baile", 'tipo' => 'N'],
			['id' => 9, 'nombre' => "Curso fin de semana para niños - Dibujo", 'tipo' => 'N'],
			['id' => 10, 'nombre' => "Curso fin de semana para niños – Origami", 'tipo' => 'N'],
			['id' => 11, 'nombre' => "Curso fin de semana para niños – Manualidades", 'tipo' => 'N'],
			['id' => 12, 'nombre' => "Curso fin de semana para niños – Cerámica", 'tipo' => 'N'],
			['id' => 13, 'nombre' => "Curso fin de semana para niños – Pintura", 'tipo' => 'N'],
			['id' => 14, 'nombre' => "Curso vacacional para niños", 'tipo' => 'N'],
			['id' => 15, 'nombre' => "Taller para adultos con enfoque terapéutico - Tejer mandalas", 'tipo' => 'N'],
			['id' => 16, 'nombre' => "Taller para adultos con enfoque terapéutico - Manualidades", 'tipo' => 'N'],
			['id' => 17, 'nombre' => "Taller para adultos con enfoque terapéutico – Cerámica", 'tipo' => 'N'],
			['id' => 18, 'nombre' => "Taller para adultos con enfoque terapéutico – Pintar mandalas", 'tipo' => 'N'],
			['id' => 19, 'nombre' => "Taller para adultos con enfoque terapéutico – pintura", 'tipo' => 'N'],
			['id' => 20, 'nombre' => "Taller de estimulación para bebés", 'tipo' => 'N'],
			['id' => 21, 'nombre' => "Taller de estimulación para adultos mayores", 'tipo' => 'N'],
			['id' => 22, 'nombre' => "Taller Familiar (Padres e hijos)", 'tipo' => 'N'],
			['id' => 23, 'nombre' => "Curso de robótica", 'tipo' => 'N'],
			['id' => 24, 'nombre' => "Alquiler de salón para fiesta infantil", 'tipo' => 'N'],
		]);
    }
}
