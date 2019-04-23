<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
    protected $table = 'tipo_contrato';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function colaborador() {
		return $this->hasMany('Artemoc\Colaborador');
	}
}
