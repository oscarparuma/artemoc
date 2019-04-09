<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = 'rubro';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function egreso() {
		return $this->hasMany('Artemoc\Egreso');
	}
}
