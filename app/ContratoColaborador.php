<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class ContratoColaborador extends Model
{
    protected $table = 'contrato_colaborador';

	protected $fillable = [
		'fecha_inicio',
        'fecha_fin',
        'hora_inicio',
        'hora_fin',
        'salario',
        'observaciones',
        'colaborador_id',
        'tipo_contrato_id',
        'servicio_id',
        'dias',
		'estado'
	];

	private $rules = [
		'fecha_inicio' => 'required',
        'fecha_fin' => 'required',
        'hora_inicio' => 'required',
        'hora_fin' => 'required',
        'salario' => 'required|numeric',
        'observaciones' => 'required',
        'colaborador_id' => 'required',
        'tipo_contrato_id' => 'required',
		'servicio_id' => 'required',
		'dias' => 'required'
	];
	
	public function servicio() {
		return $this->belongsTo('Artemoc\Servicio');
    }
    
    public function tipoContrato() {
		return $this->belongsTo('Artemoc\TipoContrato');
    }
	
	public function validate()
	{
		$v = Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
