<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

use Validator;

class ServicioEstudiante extends Model
{
    protected $table = 'servicio_estudiante';

	protected $fillable = [
		'fecha_inicio',
        'fecha_fin',
        'valor_sin_descuento',
        'descuento',
        'valor_con_descuento',
        'estudiante_id',
        'servicio_id',
        'hora_inicio',
        'hora_fin',
        'dias',
		'estado'
	];

	private $rules = [
		'fecha_inicio' => 'required',
		'fecha_fin' => 'required',
        'valor_sin_descuento' => 'required|numeric',
        'descuento' => 'nullable|numeric',
        'valor_con_descuento' => 'nullable|numeric',
		'estudiante_id' => 'required',
		'servicio_id' => 'required',
		'hora_inicio' => 'required',
		'hora_fin' => 'required',
		'dias' => 'required'
	];
	
	public function estudiante() {
		return $this->belongsTo('Artemoc\Estudiante');
	}
	
	public function servicio() {
		return $this->belongsTo('Artemoc\Servicio');
	}
	
	public function recaudo() {
		return $this->hasMany('Artemoc\Recaudo');
	}

	public function validate()
	{
		$v = Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
