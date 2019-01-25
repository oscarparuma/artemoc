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
