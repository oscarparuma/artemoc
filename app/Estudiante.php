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
		'lugar_nacimiento',
		'temas_interes',
		'estado'
	];
	
	/**
     * @var App\Enums\GrupoSanguineoEnum
     */
    public $grupo_sanguineo;

	private $rules = [
		'nombre' => 'required',
		'apellido' => 'required'
	];
	
	public function tipoDocumento() {
		return $this->belongsTo('Artemoc\TipoDocumento');
	}
	
	public function colegio() {
		return $this->belongsTo('Artemoc\Colegio');
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