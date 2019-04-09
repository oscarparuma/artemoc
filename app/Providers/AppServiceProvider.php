<?php

namespace Artemoc\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Contracts\View\Factory as ViewFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ViewFactory $view)
    {
        //
		Schema::defaultStringLength(191);
		
		$view->composer('partials.forms.estudiante',
            'Artemoc\Http\Views\Composers\EstudianteFormComposer');
        $view->composer('partials.forms.acudiente',
            'Artemoc\Http\Views\Composers\AcudienteFormComposer');
        $view->composer('partials.forms.servicioestudiante',
            'Artemoc\Http\Views\Composers\ServicioEstudianteFormComposer');
        $view->composer('partials.forms.colaborador',
            'Artemoc\Http\Views\Composers\ColaboradorFormComposer');
        $view->composer('partials.forms.contratocolaborador',
            'Artemoc\Http\Views\Composers\ContratoColaboradorFormComposer');
        $view->composer('partials.forms.recaudo',
            'Artemoc\Http\Views\Composers\RecaudoFormComposer');
        $view->composer('partials.forms.egreso',
            'Artemoc\Http\Views\Composers\EgresoFormComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
