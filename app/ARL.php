<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class ARL extends Model {

	protected $table = 'arl';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function colaboradores() {
		return $this->hasMany('Artemoc\Colaborador');
	}
}