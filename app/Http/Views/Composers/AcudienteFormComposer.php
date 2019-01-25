<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\NivelEscolaridad;
use Artemoc\TipoDocumento;
use Illuminate\Contracts\View\View;

class AcudienteFormComposer {

	protected $nivelesEscolaridad;
	protected $tiposDocumento;
	
	public function __construct(TipoDocumento $tiposDocumento, NivelEscolaridad $nivelesEscolaridad) {
		$this->nivelesEscolaridad = $nivelesEscolaridad;
		$this->tiposDocumento = $tiposDocumento;
	}
	
	public function compose(View $view) {
		$view->with('nivelesEscolaridad', $this->nivelesEscolaridad->pluck('nombre', 'id'))
			 ->with('tiposDocumento', $this->tiposDocumento->pluck('nombre', 'id'));
	}
}