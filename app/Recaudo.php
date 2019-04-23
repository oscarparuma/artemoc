<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Recaudo extends Model
{
    protected $table = 'recaudo';
	protected $fillable = [
		'mes',
		'estado',
		'valor_cancelado',
		'saldo_por_pagar',
		'fecha_pago',
		'servicio_estudiante_id',
		'forma_pago_id',
		'ruta_soporte'
	];

	private $rules = [
		'mes' => 'required',
		'estado' => 'required',
		'valor_cancelado' => 'required|numeric',
		'saldo_por_pagar' => 'required|numeric',
		'fecha_pago' => 'required|date',
		'servicio_estudiante_id' => 'required|numeric',
		'forma_pago_id' => 'required|numeric'
	];
    
    public function servicioestudiante() {
		return $this->belongsTo('Artemoc\ServicioEstudiante', 'servicio_estudiante_id');
	}

	public function forma_pago() {
		return $this->belongsTo('Artemoc\FormaPago');
	}
	
	public function validate()
	{
		$v = \Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
