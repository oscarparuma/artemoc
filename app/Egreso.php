<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Egreso extends Model
{
    protected $table = 'egreso';
	protected $fillable = [
		'valor',
		'pago_desde',
		'pago_hasta',
		'fecha_pago',
		'descripcion',
        'observaciones',
        'rubro_id',
        'colaborador_id',
		'forma_pago_id',
		'ruta_soporte'
	];

	private $rules = [
		'valor' => 'required|numeric',
		'pago_desde' => 'required|date_format:Y-m-d',
        'pago_hasta' => 'required|date_format:Y-m-d',
        'fecha_pago' => 'required|date_format:Y-m-d',
		'descripcion' => 'required',
		'rubro_id' => 'required|numeric',
		'colaborador_id' => 'numeric',
		'forma_pago_id' => 'required|numeric'
	];
    
    public function colaborador() {
		return $this->belongsTo('Artemoc\Colaborador', 'colaborador_id');
	}

	public function forma_pago() {
		return $this->belongsTo('Artemoc\FormaPago');
    }
    
    public function rubro() {
		return $this->belongsTo('Artemoc\Rubro');
	}
	
	public function validate()
	{
		$v = \Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
