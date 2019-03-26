<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\Servicio;
use Artemoc\TipoContrato;
use Illuminate\Contracts\View\View;

class ContratoColaboradorFormComposer {

	protected $servicios;
	protected $tiposContrato;
	
	public function __construct(Servicio $servicios, TipoContrato $tiposContrato) {
		$this->servicios = $servicios;
		$this->tiposContrato = $tiposContrato;
	}
	
	public function compose(View $view) {
		$view->with('servicios', $this->servicios->pluck('nombre', 'id'))
			->with('tiposContrato', $this->tiposContrato->pluck('nombre', 'id'));
	}
}