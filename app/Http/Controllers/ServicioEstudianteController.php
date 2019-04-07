<?php

namespace Artemoc\Http\Controllers;

use Artemoc\ServicioEstudiante;
use Artemoc\Estudiante;
use Carbon\Carbon;

use Request;
use Session;
use Validator;
use Redirect;
use View;

class ServicioEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param integer $estudianteId
     * @return \Illuminate\Http\Response
     */
    public function index($estudianteId)
    {
        // get the estudiante
        $estudiante = Estudiante::find($estudianteId);

        $serviciosestudiantes = ServicioEstudiante::where('estado', 'A')
                                                    ->simplePaginate(10);
        return view('serviciosestudiantes.index')
                ->with('serviciosestudiantes', $serviciosestudiantes)
                ->with('estudiante', $estudiante);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $estudianteId
     * @return \Illuminate\Http\Response
     */
    public function create($estudianteId)
    {
        // get the estudiante
        $estudiante = Estudiante::find($estudianteId);

        return view('serviciosestudiantes.create')
                ->with('estudiante', $estudiante);
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
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'valor_sin_descuento' => 'required|numeric',
            'descuento' => 'nullable|numeric',
            'valor_con_descuento' => 'nullable|numeric',
            'servicio_id' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'dias' => 'required'
        );
        $validator = Validator::make(Request::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('serviciosestudiantes/' . $estudianteId . '/create')
                ->withErrors($validator)
                ->withInput(Request::except('password'));
        } else {
            // store
            $servicioestudiante = new ServicioEstudiante;
            $servicioestudiante->fecha_inicio = Carbon::parse(Request::get('fecha_inicio'));
            $servicioestudiante->fecha_fin = Carbon::parse(Request::get('fecha_fin'));
            $servicioestudiante->valor_sin_descuento = Request::get('valor_sin_descuento');
            $servicioestudiante->descuento = Request::get('descuento');
            $servicioestudiante->valor_con_descuento = Request::get('valor_con_descuento');
            $servicioestudiante->estudiante_id = $estudianteId;
            $servicioestudiante->servicio_id = Request::get('servicio_id');
            $servicioestudiante->hora_inicio = Carbon::createFromTimeString(Request::get('hora_inicio'), 'UTC')->toTimeString();
            $servicioestudiante->hora_fin = Carbon::createFromTimeString(Request::get('hora_fin'), 'UTC')->toTimeString();
            $servicioestudiante->dias = implode(',', Request::get('dias'));
            $servicioestudiante->estado = "A"; // Activo
            $servicioestudiante->save();

            // redirect
            Session::flash('message', 'Servicio registrado a estudiante !');
            return redirect()->action('ServicioEstudianteController@index', ['estudianteId' => $estudianteId]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the servicioestudiante
        $servicioestudiante = ServicioEstudiante::find($id);

        // show the view and pass the servicioestudiante to it
        return View::make('serviciosestudiantes.show')
                    ->with('servicioestudiante', $servicioestudiante);
    }

    /**
     * Servicios asociados a un estudiante
     * 
     * @param  integer  $id
     * @return Servicio $servicios
     */
    public function findServiciosWithEstudianteID($id) {
        $serviciosestudiantes = ServicioEstudiante::where('estudiante_id',$id)->with('servicio')->get();
        return json_encode($serviciosestudiantes);
    }
}
