<?php

namespace Artemoc\Http\Controllers;

use Artemoc\ContratoColaborador;
use Artemoc\Colaborador;
use Carbon\Carbon;

use Request;
use Session;
use Validator;
use Redirect;
use View;

class ContratoColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param integer $colaboradorId
     * @return \Illuminate\Http\Response
     */
    public function index($colaboradorId)
    {
        // get the colaborador
        $colaborador = Colaborador::find($colaboradorId);

        $contratoscolaboradores = ContratoColaborador::where('estado', 'A')
                                                        ->simplePaginate(10);
        return view('contratoscolaboradores.index')
                ->with('contratoscolaboradores', $contratoscolaboradores)
                ->with('colaborador', $colaborador);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $colaboradorId
     * @return \Illuminate\Http\Response
     */
    public function create($colaboradorId)
    {
        // get the colaborador
        $colaborador = Colaborador::find($colaboradorId);

        return view('contratoscolaboradores.create')
                ->with('colaborador', $colaborador);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $colaboradorId)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'salario' => 'required|numeric',
            'servicio_id' => 'required',
            'tipo_contrato_id' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'dias' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('contratos/colaborador/' . $colaboradorId . '/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $contratocolaborador = new ContratoColaborador;
            $contratocolaborador->fecha_inicio = Carbon::parse(Request::get('fecha_inicio'));
            $contratocolaborador->fecha_fin = Carbon::parse(Request::get('fecha_fin'));
            $contratocolaborador->salario = Request::get('salario');
            $contratocolaborador->observaciones = Request::get('observaciones');
            $contratocolaborador->colaborador_id = $colaboradorId;
            $contratocolaborador->servicio_id = Request::get('servicio_id');
            $contratocolaborador->tipo_contrato_id = Request::get('tipo_contrato_id');
            $contratocolaborador->hora_inicio = Carbon::createFromTimeString(Request::get('hora_inicio'), 'UTC')->toTimeString();
            $contratocolaborador->hora_fin = Carbon::createFromTimeString(Request::get('hora_fin'), 'UTC')->toTimeString();
            $contratocolaborador->dias = implode(',', Request::get('dias'));
            $contratocolaborador->estado = "A"; // Activo
            $contratocolaborador->save();

            // redirect
            Session::flash('message', 'Contrato registrado a colaborador!');
            return redirect()->action('ContratoColaboradorController@index', ['colaboradorId' => $colaboradorId]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Artemoc\ContratoColaborador  $contratoColaborador
     * @return \Illuminate\Http\Response
     */
    public function show(ContratoColaborador $contratoColaborador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Artemoc\ContratoColaborador  $contratoColaborador
     * @return \Illuminate\Http\Response
     */
    public function edit(ContratoColaborador $contratoColaborador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Artemoc\ContratoColaborador  $contratoColaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContratoColaborador $contratoColaborador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Artemoc\ContratoColaborador  $contratoColaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContratoColaborador $contratoColaborador)
    {
        //
    }
}
