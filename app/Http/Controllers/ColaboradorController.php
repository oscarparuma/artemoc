<?php

namespace Artemoc\Http\Controllers;

use Artemoc\Colaborador;

use Request;
use Session;
use Validator;
use Redirect;
use View;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colaboradores = Colaborador::where('estado', 'A')
                                ->orderBy('nombre','asc')
                                ->orderBy('apellido','asc')
                                ->simplePaginate(10);
		return view('colaboradores.index')->with('colaboradores', $colaboradores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colaboradores.create');
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
            'tipo_documento_id' => 'required|numeric',
            'numero_documento' => 'required',
            'profesion' => 'required',
            'celular' => 'required',
            'correo_electronico' => 'required',
            'eps_id' => 'required|numeric',
            'arl_id' => 'required|numeric',
            'grupo_sanguineo' => 'required',
            'factor_rh' => 'required',
            'nombre_contacto_emergencia' => 'required',
            'telefono_contacto_emergencia' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('colaboradores/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $colaborador = new Colaborador;
            $colaborador->nombre = Request::get('nombre');
            $colaborador->apellido = Request::get('apellido');
            $colaborador->tipo_documento_id = Request::get('tipo_documento_id');
            $colaborador->numero_documento = Request::get('numero_documento');
            $colaborador->profesion = Request::get('profesion');
            $colaborador->telefono = Request::get('telefono');
            $colaborador->celular = Request::get('celular');
            $colaborador->correo_electronico = Request::get('correo_electronico');
            $colaborador->eps_id = Request::get('eps_id');
            $colaborador->arl_id = Request::get('arl_id');
            $colaborador->grupo_sanguineo = Request::get('grupo_sanguineo');
            $colaborador->factor_rh = Request::get('factor_rh');
            $colaborador->nombre_contacto_emergencia = Request::get('nombre_contacto_emergencia');
            $colaborador->telefono_contacto_emergencia = Request::get('telefono_contacto_emergencia');
            $colaborador->estado = "A"; // Activo
            $colaborador->save();

            // redirect
            Session::flash('message', 'Colaborador registrado!');
            return redirect()->action('ColaboradorController@index')
                            ->with('success', 'Colaborador registrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Artemoc\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show(Colaborador $colaborador)
    {
        // get the colaborador
        $colaborador = Colaborador::find($id);

        // show the view and pass the colaborador to it
        return View::make('colaboradores.show')
            ->with('colaborador', $colaborador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the colaborador
        $colaborador = Colaborador::find($id);

        // show the edit form and pass the colaborador
        return View::make('colaboradores.edit')
            ->with('colaborador', $colaborador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Artemoc\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'nombre' => 'required',
            'apellido' => 'required',
            'tipo_documento_id' => 'required|numeric',
            'numero_documento' => 'required',
            'profesion' => 'required',
            'celular' => 'required',
            'correo_electronico' => 'required',
            'eps_id' => 'required|numeric',
            'arl_id' => 'required|numeric',
            'grupo_sanguineo' => 'required',
            'factor_rh' => 'required',
            'nombre_contacto_emergencia' => 'required',
            'telefono_contacto_emergencia' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('colaboradores/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $colaborador->nombre = Request::get('nombre');
            $colaborador->apellido = Request::get('apellido');
            $colaborador->tipo_documento_id = Request::get('tipo_documento_id');
            $colaborador->numero_documento = Request::get('numero_documento');
            $colaborador->profesion = Request::get('profesion');
            $colaborador->telefono = Request::get('telefono');
            $colaborador->celular = Request::get('celular');
            $colaborador->correo_electronico = Request::get('correo_electronico');
            $colaborador->eps_id = Request::get('eps_id');
            $colaborador->arl_id = Request::get('arl_id');
            $colaborador->grupo_sanguineo = Request::get('grupo_sanguineo');
            $colaborador->factor_rh = Request::get('factor_rh');
            $colaborador->nombre_contacto_emergencia = Request::get('nombre_contacto_emergencia');
            $colaborador->telefono_contacto_emergencia = Request::get('telefono_contacto_emergencia');
            $colaborador->estado = "A"; // Activo
            $colaborador->save();

            // redirect
            Session::flash('message', 'Colaborador actualizado!');
            return Redirect::to('colaboradores');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Artemoc\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Colaborador $colaborador)
    {
        //
    }

    /**
     * Inactiva un colaborador
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function inactivate($id) {
        // get the colaborador
        $colaborador = Colaborador::find($id);
        
        // inactivate
        $estudiante->estado = 'I';
        $estudiante->save();

        // redirect
        Session::flash('message', 'Colaborador inactivado!');
        return redirect()->action('ColaboradorController@index')
                        ->with('success', 'Colaborador inactivado!');
    }
}
