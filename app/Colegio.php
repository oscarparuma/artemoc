<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model {

	protected $table = 'colegio';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function estudiantes() {
		return $this->hasMany('Artemoc\Estudiante');
	}
}