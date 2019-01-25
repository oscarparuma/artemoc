<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

use Validator;

class Acudiente extends Model
{
    protected $table = 'acudiente';

	protected $fillable = [
		'nombre',
		'apellido',
		'tipo_documento_id',
		'numero_documento',
		'direccion_residencia',
		'direccion_oficina',
		'telefono',
		'celular',
		'ocupacion',
		'correo_electronico',
		'nivel_escolaridad_id'
	];

	private $rules = [
		'nombre' => 'required',
        'apellido' => 'required',
        'tipo_documento_id' => 'required|numeric',
		'numero_documento' => 'required',
		'direccion_residencia' => 'required',
		'direccion_oficina' => 'required',
		'telefono' => 'required',
		'celular' => 'required|numeric',
		'ocupacion' => 'required',
        'correo_electronico' => 'required|email',
        'nivel_escolaridad_id' => 'required|numeric'
	];
	
	public function tipoDocumento() {
		return $this->belongsTo('Artemoc\TipoDocumento');
	}

	public function nivelEscolaridad() {
		return $this->belongsTo('Artemoc\NivelEscolaridad');
	}
	
	public function estudiantes() {
		return $this->belongsToMany(Estudiante::class, 'acudiente_estudiante',
									'acudiente_id', 'estudiante_id');
    }

	public function validate()
	{
		$v = Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
    }
    
}
