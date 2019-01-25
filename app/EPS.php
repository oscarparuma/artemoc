<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class EPS extends Model {

	protected $table = 'eps';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function estudiantes() {
		return $this->hasMany('Artemoc\Estudiante');
	}
}