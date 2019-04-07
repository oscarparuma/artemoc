<?php

namespace Artemoc\Http\Controllers;

use Artemoc\Recaudo;
use Artemoc\ServicioEstudiante;
use Artemoc\Estudiante;
use Artemoc\Servicio;
use Carbon\Carbon;

use Request;
use Validator;
use Redirect;
use Session;
use View;

class RecaudoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recaudos = Recaudo::with('servicioestudiante')->simplePaginate(10);
        return view('recaudos.index')->with('recaudos', $recaudos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recaudos.create');
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
            'mes' => 'required',
            'estado' => 'required',
            'valor_cancelado' => 'required|numeric',
            'saldo_por_pagar' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'servicio' => 'required|numeric',
            'forma_pago_id' => 'required|numeric'
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('recaudos/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            $servicioEstudiante = ServicioEstudiante::where([
                ['servicio_id', '=', Request::get('servicio')],
                ['estudiante_id', '=', Request::get('estudiante_id')],
                ['estado', '=', 'A'],
            ])->first();
            // store
            $recaudo = new Recaudo;
            $recaudo->mes = Request::get('mes');
            $recaudo->estado = Request::get('estado');
            $recaudo->valor_cancelado = Request::get('valor_cancelado');
            $recaudo->saldo_por_pagar = Request::get('saldo_por_pagar');
            $recaudo->fecha_pago = Carbon::parse(Request::get('fecha_pago'));
            $recaudo->forma_pago_id = Request::get('forma_pago_id');
            $recaudo->ruta_soporte = Request::get('ruta_soporte');
            $recaudo->servicio_estudiante_id = $servicioEstudiante->id;
            $recaudo->save();

            // redirect
            Session::flash('message', 'Recaudo registrado!');
            return redirect()->action('RecaudoController@index')
                            ->with('success', 'Recaudo registrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Artemoc\Recaudo  $recaudo
     * @return \Illuminate\Http\Response
     */
    public function show(Recaudo $recaudo)
    {
        // show the view and pass the recaudo to it
        return View::make('recaudos.show')
            ->with('recaudo', $recaudo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Artemoc\Recaudo  $recaudo
     * @return \Illuminate\Http\Response
     */
    public function edit(Recaudo $recaudo)
    {
        // Ref: https://stackoverflow.com/questions/33501645/populate-dropdown-based-on-another-dropdown-selected-value-in-laravel-edit-for
        $servicios = Servicio::all()->pluck('nombre', 'id');
        // show the edit form and pass the estudiante
        return View::make('recaudos.edit', ['servicios' => $servicios])
            ->with('recaudo', $recaudo->load('servicioestudiante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Artemoc\Recaudo  $recaudo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recaudo $recaudo)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'mes' => 'required',
            'estado' => 'required',
            'valor_cancelado' => 'required|numeric',
            'saldo_por_pagar' => 'required|numeric',
            'fecha_pago' => 'required|date',
            'servicio' => 'required|numeric',
            'forma_pago_id' => 'required|numeric'
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('recaudos/' . $recaudo->id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $servicioEstudiante = ServicioEstudiante::where([
                ['servicio_id', '=', Request::get('servicio')],
                ['estudiante_id', '=', Request::get('estudiante_id')],
                ['estado', '=', 'A'],
            ])->first();

            if(!$servicioEstudiante) {
                $servicio = Servicio::find(Request::get('servicio'));
                Session::flash('message', 'El estudiante no tiene asociado el servicio '. $servicio->nombre .'. Error al actualizar recaudo!');
                Session::flash('alert-class', 'alert-danger');
                return Redirect::to('recaudos/' . $recaudo->id . '/edit');
            }

            // Se actualiza el recaudo con los datos registrados en el formulario
            // store
            $recaudo->mes = Request::get('mes');
            $recaudo->estado = Request::get('estado');
            $recaudo->valor_cancelado = Request::get('valor_cancelado');
            $recaudo->saldo_por_pagar = Request::get('saldo_por_pagar');
            $recaudo->fecha_pago = Carbon::parse(Request::get('fecha_pago'));
            $recaudo->forma_pago_id = Request::get('forma_pago_id');
            $recaudo->ruta_soporte = Request::get('ruta_soporte');
            $recaudo->servicio_estudiante_id = $servicioEstudiante->id;
            $recaudo->save();

            // redirect
            Session::flash('message', 'Recaudo actualizado!');
            return Redirect::to('recaudos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Artemoc\Recaudo  $recaudo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recaudo $recaudo)
    {
        //
    }

}
