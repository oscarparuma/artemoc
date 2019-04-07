<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    protected $table = 'forma_pago';
	protected $fillable = ['nombre'];
	public $timestamps = false;
	
	public function recaudo() {
		return $this->hasMany('Artemoc\Recaudo');
	}
}
