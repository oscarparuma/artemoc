<?php

namespace Artemoc\Http\Controllers;

use Artemoc\Acudiente;
use Artemoc\Estudiante;

use Validator;
use Request;
use Session;

class AcudienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acudientes = Acudiente::where('estado', 'A')
                                ->orderBy('nombre','asc')
                                ->orderBy('apellido','asc')
                                ->simplePaginate(10);
                                
		return view('acudientes.index')->with('acudientes', $acudientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $estudianteId
     * @return \Illuminate\Http\Response
     */
    public function create($estudianteId)
    {
        $estudiante = Estudiante::find($estudianteId);

        return view('acudientes.create')->with('estudiante', $estudiante);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $estudianteId)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'tipo_documento_id' => 'required|numeric',
            'numero_documento' => 'required',
            'direccion_residencia' => 'required',
            'direccion_oficina' => 'required',
            'telefono' => 'required',
            'celular' => 'required|numeric',
            'ocupacion' => 'required',
            'correo_electronico' => 'required|email',
            'nivel_escolaridad_id' => 'required|numeric'
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('acudientes/estudiante/' . $estudianteId . '/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $acudiente = new Acudiente;
            $acudiente->nombre = Request::get('nombre');
            $acudiente->apellido = Request::get('apellido');
            $acudiente->tipo_documento_id = Request::get('tipo_documento_id');
            $acudiente->numero_documento = Request::get('numero_documento');
            $acudiente->direccion_residencia = Request::get('direccion_residencia');
            $acudiente->direccion_oficina = Request::get('direccion_oficina');
            $acudiente->telefono = Request::get('telefono');
            $acudiente->celular = Request::get('celular');
            $acudiente->correo_electronico = Request::get('correo_electronico');
            $acudiente->ocupacion = Request::get('ocupacion');
            $acudiente->nivel_escolaridad_id = Request::get('nivel_escolaridad_id');
            $acudiente->estado = "A"; // Activo
            $acudiente->save();

            // Crea el registro en la tabla pivot acudiente_estudiante
            $acudiente->estudiantes()->attach($estudianteId);

            // redirect
            Session::flash('message', 'Acudiente registrado!');
            return redirect()->action('AcudienteController@acudienteEstudianteIndex', ['estudianteId' => $estudianteId])
                            ->with('success', 'Acudiente registrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Artemoc\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function show(Acudiente $acudiente)
    {
        // get the acudiente
        $acudiente = Acudiente::find($id);

        // show the view and pass the acudiente to it
        return View::make('acudientes.show')
                    ->with('acudiente', $acudiente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Artemoc\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function edit(Acudiente $acudiente)
    {
        // get the acudiente
        $acudiente = Acudiente::find($id);

        // show the edit form and pass the acudiente
        return View::make('acudientes.edit')
                    ->with('acudiente', $acudiente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Artemoc\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acudiente $acudiente)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'tipo_documento_id' => 'required|numeric',
            'numero_documento' => 'required',
            'direccion_residencia' => 'required',
            'direccion_oficina' => 'required',
            'telefono' => 'required',
            'celular' => 'required|numeric',
            'ocupacion' => 'required',
            'correo_electronico' => 'required|email',
            'nivel_escolaridad_id' => 'required|numeric'
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('acudientes/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $acudiente->nombre = Request::get('nombre');
            $acudiente->apellido = Request::get('apellido');
            $acudiente->tipo_documento_id = Request::get('tipo_documento_id');
            $acudiente->numero_documento = Request::get('numero_documento');
            $acudiente->direccion_residencia = Request::get('direccion_residencia');
            $acudiente->direccion_oficina = Request::get('direccion_oficina');
            $acudiente->telefono = Request::get('telefono');
            $acudiente->celular = Request::get('celular');
            $acudiente->correo_electronico = Request::get('correo_electronico');
            $acudiente->ocupacion = Request::get('ocupacion');
            $acudiente->nivel_escolaridad_id = Request::get('nivel_escolaridad_id');
            $acudiente->save();

            // redirect
            Session::flash('message', 'Acudiente actualizado!');
            return Redirect::to('acudientes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Artemoc\Acudiente  $acudiente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acudiente $acudiente)
    {
        //
    }

    /**
     * Inactiva un acudiente
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function inactivate($id) {
        // get the acudiente
        $acudiente = Acudiente::find($id);
        
        // inactivate
        $acudiente->estado = 'I';
        $acudiente->save();

        // redirect
        Session::flash('message', 'Acudiente inactivado!');
        return redirect()->action('AcudienteController@index')
                        ->with('success', 'Acudiente inactivado!');
    }

    /**
     * Listado de los acudientes asociados a un estudiante.
     *
     * @return \Illuminate\Http\Response
     */
    public function acudienteEstudianteIndex($estudianteId) {

        $estudiante = Estudiante::find($estudianteId);

        $acudientes = Estudiante::find($estudianteId)->acudientes()
                                                    ->where('estado', 'A')
                                                    ->orderBy('nombre','asc')
                                                    ->orderBy('apellido','asc')
                                                    ->get();
        
        return view('acudientes.acudienteEstudianteIndex')->with('acudientes', $acudientes)
                                                        ->with('estudiante', $estudiante);
    }

    public function search(Request  $request) {
        $result = Acudiente::where('numero_documento', 'LIKE', "%{$request->input('query')}%")->get();
        return response()->json($result);
    }
}
