<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicio';
	protected $fillable = [
		'nombre',
		'tipo'
	];

	private $rules = [
		'nombre' => 'required'
	];
	
	public function validate()
	{
		$v = \Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
