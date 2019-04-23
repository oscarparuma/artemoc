<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {

	protected $table = 'estudiante';
	protected $fillable = [
		'nombre',
		'apellido',
		'tipo_documento_id',
		'numero_documento',
		'eps_id',
		'edad',
		'fecha_nacimiento',
		'curso',
		'colegio_id',
		'grupo_sanguineo',
		'factor_rh',
		'observaciones',
		'municipio_id',
		'temas_interes',
		'estado'
	];

	private $rules = [
		'nombre' => 'required',
		'apellido' => 'required',
		'numero_documento' => 'required',
		'edad' => 'required',
		'fecha_nacimiento' => 'required',
		'municipio' => 'required',
		'curso' => 'required',
		'temas_interes' => 'required',
		'grupo_sanguineo' => 'required'
	];

	protected $appends = [
		'full_name' => '',
	];

	public function getFullNameAttribute() {
    	return $this->nombre . " " . $this->apellido;
	}

	public function tipoDocumento() {
		return $this->belongsTo('Artemoc\TipoDocumento');
	}
	
	public function colegio() {
		return $this->belongsTo('Artemoc\Colegio');
	}
	
	public function eps() {
		return $this->belongsTo('Artemoc\EPS');
	}
	
	public function acudientes() {
		return $this->belongsToMany(Acudiente::class, 'acudiente_estudiante',
									'estudiante_id', 'acudiente_id');
    }

	public function validate()
	{
		$v = \Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}