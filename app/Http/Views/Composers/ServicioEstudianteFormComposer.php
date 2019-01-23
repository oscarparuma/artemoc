<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\Servicio;
use Illuminate\Contracts\View\View;

class ServicioEstudianteFormComposer {

	protected $servicios;
	
	public function __construct(Servicio $servicios) {
		$this->servicios = $servicios;
	}
	
	public function compose(View $view) {
		$view->with('servicios', $this->servicios->pluck('nombre', 'id'));
	}
}