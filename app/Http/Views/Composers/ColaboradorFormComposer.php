<?php

namespace Artemoc\Http\Views\Composers;

use Artemoc\ARL;
use Artemoc\EPS;
use Artemoc\TipoDocumento;
use Illuminate\Contracts\View\View;

class ColaboradorFormComposer {

	protected $listARL;
	protected $listEPS;
	protected $tiposDocumento;
	
	public function __construct(TipoDocumento $tiposDocumento, ARL $listARL,
								EPS $listEPS) {
		$this->listARL = $listARL;
		$this->listEPS = $listEPS;
		$this->tiposDocumento = $tiposDocumento;
	}
	
	public function compose(View $view) {
		$view->with('listARL', $this->listARL->pluck('nombre', 'id'))
			 ->with('listEPS', $this->listEPS->pluck('nombre', 'id'))
			 ->with('tiposDocumento', $this->tiposDocumento->pluck('nombre', 'id'));
	}
}