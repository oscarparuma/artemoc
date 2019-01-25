<?php

namespace Artemoc;

use Illuminate\Database\Eloquent\Model;

use Validator;

class NivelEscolaridad extends Model
{
    protected $table = 'nivel_escolaridad';

    protected $fillable = ['nombre'];
    
	public $timestamps = false;
    
    private $rules = [
		'nombre' => 'required'
	];

	public function acudiente() {
		return $this->hasMany('Artemoc\Acudiente');
    }
	
	public function validate()
	{
		$v = Validator::make($this->attributes, $this->rules);
		if ($v->passes()) return true;
		$this->errors = $v->messages();
		return false;
	}
}
