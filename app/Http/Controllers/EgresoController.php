<?php

namespace Artemoc\Http\Controllers;

use Artemoc\Egreso;
use Carbon\Carbon;

use Request;
use Validator;
use Redirect;
use Session;
use View;

class EgresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $egresos = Egreso::with('colaborador')->simplePaginate(10);
        return view('egresos.index')->with('egresos', $egresos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('egresos.create');
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
            'valor' => 'required|numeric',
            'pago_desde' => 'required|date_format:Y-m-d',
            'pago_hasta' => 'required|date_format:Y-m-d',
            'fecha_pago' => 'required|date_format:Y-m-d',
            'descripcion' => 'required',
            'rubro_id' => 'required|numeric',
            'forma_pago_id' => 'required|numeric',
            'colaborador_id' => [
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $fail('The '. $attribute .' must be a number.');
                    }
                },
            ],
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('egresos/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $egreso = new Egreso;
            $egreso->valor = Request::get('valor');
            $egreso->pago_desde = Carbon::parse(Request::get('pago_desde'));
            $egreso->pago_hasta = Carbon::parse(Request::get('pago_hasta'));
            $egreso->fecha_pago = Carbon::parse(Request::get('fecha_pago'));
            $egreso->descripcion = Request::get('descripcion');
            $egreso->observaciones = Request::get('observaciones');
            $egreso->rubro_id = Request::get('rubro_id');
            if(Request::get('colaborador_id') != '') {
                $egreso->colaborador_id = Request::get('colaborador_id');
            }
            $egreso->forma_pago_id = Request::get('forma_pago_id');
            $egreso->ruta_soporte = Request::get('ruta_soporte');
            $egreso->save();

            // redirect
            Session::flash('message', 'Egreso registrado!');
            return redirect()->action('EgresoController@index')
                            ->with('success', 'Egreso registrado!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Artemoc\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function show(Egreso $egreso)
    {
        // show the view and pass the egreso to it
        return View::make('egresos.show')
            ->with('egreso', $egreso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Artemoc\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function edit(Egreso $egreso)
    {
        // show the edit form and pass the egreso
        return View::make('egresos.edit')
            ->with('egreso', $egreso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Artemoc\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egreso $egreso)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'valor' => 'required|numeric',
            'pago_desde' => 'required|date_format:Y-m-d',
            'pago_hasta' => 'required|date_format:Y-m-d',
            'fecha_pago' => 'required|date_format:Y-m-d',
            'descripcion' => 'required',
            'rubro_id' => 'required|numeric',
            'forma_pago_id' => 'required|numeric',
            'colaborador_id' => [
                function ($attribute, $value, $fail) {
                    if ($value) {
                        $fail('The '. $attribute .' must be a number.');
                    }
                },
            ],
        );
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('egresos/' . $egreso->id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // Se actualiza el egreso con los datos registrados en el formulario
            // store
            $egreso->valor = Request::get('valor');
            $egreso->pago_desde = Carbon::parse(Request::get('pago_desde'));
            $egreso->pago_hasta = Carbon::parse(Request::get('pago_hasta'));
            $egreso->fecha_pago = Carbon::parse(Request::get('fecha_pago'));
            $egreso->descripcion = Request::get('descripcion');
            $egreso->observaciones = Request::get('observaciones');
            $egreso->rubro_id = Request::get('rubro_id');
            if(Request::get('colaborador_id') != '') {
                $egreso->colaborador_id = Request::get('colaborador_id');
            }
            $egreso->forma_pago_id = Request::get('forma_pago_id');
            $egreso->ruta_soporte = Request::get('ruta_soporte');
            $egreso->save();

            // redirect
            Session::flash('message', 'Egreso actualizado!');
            return Redirect::to('egresos');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Artemoc\Egreso  $egreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egreso $egreso)
    {
        //
    }
}
