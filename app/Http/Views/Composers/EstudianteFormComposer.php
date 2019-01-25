<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\Colegio;
use Artemoc\EPS;
use Artemoc\TipoDocumento;
use Artemoc\Departamento;
use Illuminate\Contracts\View\View;

class EstudianteFormComposer {

	protected $colegios;
	protected $listEPS;
	protected $tiposDocumento;
	protected $departamentos;
	
	public function __construct(TipoDocumento $tiposDocumento, Colegio $colegios,
								EPS $listEPS, Departamento $departamentos) {
		$this->colegios = $colegios;
		$this->listEPS = $listEPS;
		$this->tiposDocumento = $tiposDocumento;
		$this->departamentos = $departamentos;
	}
	
	public function compose(View $view) {
		$view->with('colegios', $this->colegios->pluck('nombre', 'id'))
			 ->with('listEPS', $this->listEPS->pluck('nombre', 'id'))
			 ->with('tiposDocumento', $this->tiposDocumento->pluck('nombre', 'id'))
			 ->with('departamentos', $this->departamentos->pluck('nombre', 'id'));
	}
}