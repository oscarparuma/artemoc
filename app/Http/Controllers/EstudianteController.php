<?php

namespace Artemoc\Http\Controllers;

use Artemoc\Estudiante;
use Artemoc\Departamento;
use Artemoc\Municipio;
use Carbon\Carbon;

use Request;
use Session;
use Validator;
use Redirect;
use View;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::where('estado', 'A')
                                ->orderBy('nombre','asc')
                                ->orderBy('apellido','asc')
                                ->simplePaginate(10);
		return view('estudiantes.index')->with('estudiantes', $estudiantes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_documento' => 'required',
            'tipo_documento_id' => 'required',
            'edad' => 'required|numeric',
            'fecha_nacimiento' => 'required',
            'municipio' => 'required',
            'curso' => 'required|numeric',
            'temas_interes' => 'required',
            'eps_id' => 'required',
            'colegio_id' => 'required',
            'grupo_sanguineo' => 'required',
            'factor_rh' => 'required',
            'temas_interes' => 'required',
            'observaciones' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('estudiantes/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $estudiante = new Estudiante;
            $estudiante->nombre = Request::get('nombre');
            $estudiante->apellido = Request::get('apellido');
            $estudiante->tipo_documento_id = Request::get('tipo_documento_id');
            $estudiante->numero_documento = Request::get('numero_documento');
            $estudiante->eps_id = Request::get('eps_id');
            $estudiante->edad = Request::get('edad');
            $estudiante->fecha_nacimiento = Carbon::parse(Request::get('fecha_nacimiento'));
            $estudiante->curso = Request::get('curso');
            $estudiante->colegio_id = Request::get('colegio_id');
            $estudiante->grupo_sanguineo = Request::get('grupo_sanguineo');
            $estudiante->factor_rh = Request::get('factor_rh');
            $estudiante->observaciones = Request::get('observaciones');
            $estudiante->municipio_id = Request::get('municipio');
            $estudiante->temas_interes = Request::get('temas_interes');
            $estudiante->estado = "A"; // Activo
            $estudiante->save();

            /*$estudiantes = Estudiante::where('estado', 'A')
                                    ->orderBy('nombre','asc')
                                    ->orderBy('apellido','asc')
                                    ->simplePaginate(10);*/

            // redirect
            Session::flash('message', 'Estudiante registrado!');
            return redirect()->action('EstudianteController@index')
                            ->with('success', 'Estudiante registrado!');
            /*return view('estudiantes.index')
                    ->with('estudiantes', $estudiantes)
                    ->with('success', 'Estudiante registrado!');*/
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Artemoc\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        // get the estudiante
        $estudiante = Estudiante::find($id);

        // show the view and pass the estudiante to it
        return View::make('estudiantes.show')
            ->with('estudiante', $estudiante);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Artemoc\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudiante $estudiante)
    {
        // get the estudiante
        $estudiante = Estudiante::find($id);

        // show the edit form and pass the estudiante
        return View::make('estudiantes.edit')
            ->with('estudiante', $estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Artemoc\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_documento' => 'required',
            'edad' => 'required|numeric',
            'fecha_nacimiento' => 'required',
            'municipio' => 'required',
            'curso' => 'required',
            'temas_interes' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('estudiantes/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $estudiante = Estudiante::find($id);
            $estudiante->name       = Input::get('name');
            $estudiante->email      = Input::get('email');
            $estudiante->nerd_level = Input::get('nerd_level');
            $estudiante->save();

            // redirect
            Session::flash('message', 'Estudiante actualizado!');
            return Redirect::to('estudiantes');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Artemoc\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }

    /**
     * Inactiva un estudiante
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function inactivate($id) {
        // get the estudiante
        $estudiante = Estudiante::find($id);
        
        // inactivate
        $estudiante->estado = 'I';
        $estudiante->save();

        // redirect
        Session::flash('message', 'Estudiante inactivado!');
        return redirect()->action('EstudianteController@index')
                        ->with('success', 'Estudiante inactivado!');
    }

    /**
     * Municipios asociados a un departamento
     * 
     * @param  integer  $id
     * @return Municipio $municipios
     */
    public function findMunicipioWithDepartamentoID($id)
    {
        $municipios = Municipio::where('departamento_id',$id)->pluck("nombre", "id");
        return json_encode($municipios);
    }

}
