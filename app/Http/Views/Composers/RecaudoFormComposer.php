<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\Estudiante;
use Artemoc\FormaPago;
use Illuminate\Contracts\View\View;

class RecaudoFormComposer {

	protected $estudiantes;
	protected $formasPago;
	
	public function __construct(Estudiante $estudiantes, FormaPago $formasPago) {

		$this->estudiantes = $estudiantes;
		$this->formasPago = $formasPago;
	}
	
	public function compose(View $view) {
		$view->with('estudiantes', $this->estudiantes::get()->pluck('full_name', 'id'))
			->with('formasPago', $this->formasPago->pluck('nombre', 'id'));
	}
}