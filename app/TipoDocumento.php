<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model {

	protected $table = 'tipo_documento';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function estudiantes() {
		return $this->hasMany('Artemoc\Estudiante');
	}
}