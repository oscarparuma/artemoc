<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');

// Estudiantes
Route::resource('estudiantes', 'EstudianteController');
Route::patch('estudiantes/{id}/inactivate', 'EstudianteController@inactivate');

// Acudientes
Route::resource('acudientes', 'AcudienteController');
Route::patch('acudientes/{id}/inactivate', 'AcudienteController@inactivate');
Route::get('acudientes/estudiante/{estudianteId}', 'AcudienteController@acudienteEstudianteIndex');
Route::get('acudientes/estudiante/{estudianteId}/create', 'AcudienteController@create');
Route::post('acudientes/estudiante/{estudianteId}', 'AcudienteController@store');

// Servicios
Route::resource('servicios', 'ServicioController');

// Servicios Estudiantes
Route::get('serviciosestudiantes/{estudianteId}', 'ServicioEstudianteController@index');
Route::get('serviciosestudiantes/{estudianteId}/create', 'ServicioEstudianteController@create');
Route::post('serviciosestudiantes/{estudianteId}', 'ServicioEstudianteController@store');
Route::get('serviciosestudiantes/servicio/{id}', 'ServicioEstudianteController@show');
Route::get('serviciosestudiantes/{servicioestudiante}/edit', 'ServicioEstudianteController@edit');
Route::put('serviciosestudiantes/{servicioestudiante}', 'ServicioEstudianteController@update');
Route::patch('serviciosestudiantes/{id}/inactivate', 'ServicioEstudianteController@inactivate');
Route::get('serviciosestudiantes/getservicios/{estudianteId}', 'ServicioEstudianteController@findServiciosWithEstudianteID');

// Colaboradores
Route::resource('colaboradores', 'ColaboradorController');

// Contratos Colaboradores
Route::get('contratos/colaborador/{colaboradorId}', 'ContratoColaboradorController@index');
Route::get('contratos/colaborador/{colaboradorId}/create', 'ContratoColaboradorController@create');
Route::post('contratos/colaborador/{colaboradorId}', 'ContratoColaboradorController@store');
Route::get('contratos/colaborador/{id}', 'ContratoColaboradorController@show');
Route::get('contratos/colaborador/{id}/edit', 'ContratoColaboradorController@edit');
Route::patch('contratos/colaborador/{id}/inactivate', 'ContratoColaboradorController@inactivate');

// Recaudo
Route::resource('recaudos', 'RecaudoController');

// Egreso
Route::resource('egresos', 'EgresoController');

// Retorna los municipios asociados al departamento id
Route::get('findMunicipioWithDepartamentoID/{id}','EstudianteController@findMunicipioWithDepartamentoID');

// Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
