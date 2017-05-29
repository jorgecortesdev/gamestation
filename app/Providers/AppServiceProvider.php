<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // \Debugbar::disable();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Lo utiliza Carbon para traducir las fechas
        // se debe asegurar que el idioma esté instalado
        // en el sistema con: $ locale -a
        // En caso de no estarlo, se puede instalar
        // con: $ sudo locale-gen es
        // Se debe reiniciar la maquina :(
        setlocale(LC_TIME, config('app.locale'));

        // Lo utiliza la función money_format() de PHP
        // para regresar el formato de moneda correcto
        setlocale(LC_MONETARY, config('app.locale'));

        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }
    }
}
