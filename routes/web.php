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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'WelcomeController@index');

/*Route::get('/', function() {
	return redirect('estudiantes');
});*/

//Route::get('home', 'HomeController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

/*Route::get('estudiantes/{id}', function($id) {
	return sprintf('Estudiante #%s', $id);
})->where('id', '[0-9]+');*/

/*Route::get('estudiantes', function() {
	return 'All estudiantes';
});*/

Route::get('about', function() {
	return view('about')->with('numero_estudiantes', 40);
});

/*Route::get('estudiantes', function() {
	$estudiantes = Artemoc\Estudiante::all();
	return view('estudiantes.index')->with('estudiantes', $estudiantes);
});*/

/*Route::get('estudiantes/colegios/{nombre}', function($nombre) {
	$colegio = Artemoc\Colegio::with('estudiantes')
		->whereNombre($nombre)
		->first();
	return view('estudiantes.index')
		->with('colegio', $colegio)
		->with('estudiantes', $colegio->estudiantes);
});*/

/*Route::get('estudiantes/{id}', function($id) {
	$estudiante = Artemoc\Estudiante::find($id);
	return view('estudiantes.show')->with('estudiante', $estudiante);
});*/

/*Route::get('estudiantes/{estudiante}', function(Artemoc\Estudiante $estudiante) {
	return view('estudiantes.show')->with('estudiante', $estudiante);
});*/

/*Route::get('estudiantes/create', function() {
	return view('estudiantes.create');
});*/

/*Route::post('estudiantes', function() {
	$estudiante = Artemoc\Estudiante::create(Input::all());
	return redirect('estudiantes/'.$estudiante->id)
		->withSuccess('Se ha registrado al estudiante.');
});*/

/*Route::get('estudiantes/{estudiante}/edit', function(Artemoc\Estudiante $estudiante) {
	return view('estudiantes.edit')->with('estudiante', $estudiante);
});

Route::put('estudiantes/{estudiante}', function(Artemoc\Estudiante $estudiante) {
	$estudiante->update(Input::all());
	return redirect('estudiantes/'.$estudiante->id)
		->withSuccess('Estudiante actualizado.');
});

Route::delete('estudiantes/{estudiante}', function(Artemoc\Estudiante $estudiante) {
	$estudiante->delete();
	return redirect('estudiantes')
		->withSuccess('Estudiante borrado.');
});*/

//Route::get('estudiante/{id}', ['uses' => 'EstudianteController@show']);

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
Route::get('serviciosestudiantes/{id}/edit', 'ServicioEstudianteController@edit');
Route::patch('serviciosestudiantes/{id}/inactivate', 'ServicioEstudianteController@inactivate');

// Retorna los municipios asociados al departamento id
Route::get('findMunicipioWithDepartamentoID/{id}','EstudianteController@findMunicipioWithDepartamentoID');
