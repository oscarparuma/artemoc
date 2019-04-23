<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\Colaborador;
use Artemoc\FormaPago;
use Artemoc\Rubro;
use Illuminate\Contracts\View\View;

class EgresoFormComposer {

	protected $colaboradores;
	protected $formasPago;
	protected $rubros;
	
	public function __construct(Colaborador $colaboradores, FormaPago $formasPago, Rubro $rubros) {

		$this->colaboradores = $colaboradores;
		$this->formasPago = $formasPago;
		$this->rubros = $rubros;
	}
	
	public function compose(View $view) {
		$view->with('colaboradores', $this->colaboradores::get()->pluck('full_name', 'id'))
			->with('formasPago', $this->formasPago->pluck('nombre', 'id'))
			->with('rubros', $this->rubros->pluck('nombre', 'id'));
	}
}