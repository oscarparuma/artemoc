<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = 'colaborador';
	protected $fillable = [
		'nombre',
		'apellido',
		'tipo_documento_id',
        'numero_documento',
        'profesion',
        'telefono',
        'celular',
        'correo_electronico',
		'eps_id',
		'arl_id',
		'grupo_sanguineo',
		'factor_rh',
		'nombre_contacto_emergencia',
		'telefono_contacto_emergencia',
		'estado'
	];

	private $rules = [
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
	];
	
	public function tipoDocumento() {
		return $this->belongsTo('Artemoc\TipoDocumento');
	}
	
	public function arl() {
		return $this->belongsTo('Artemoc\ARL');
	}
	
	public function eps() {
		return $this->belongsTo('Artemoc\EPS');
	}
	
	public function validate()
	{
		$v = \Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
