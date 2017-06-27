<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\GameStation\Calendar\GoogleCalendar;
use App\GameStation\Calendar\CalendarGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Having issues with siteground hosting creating indexes, refers to:
        // https://laravel.com/docs/master/migrations#creating-indexes
        Schema::defaultStringLength(191);

        view()->composer('*', function($view) {
            return $view->with('signedIn', auth()->check());
        });
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

        // if ($this->app->isLocal()) {
        //     $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        // }

        $this->app->singleton(CalendarGateway::class, function($app) {
            $calendar_id = config('google.calendar.id');
            $key_file    = config('google.calendar.key_file');
            $scopes      = config('google.calendar.scopes');
            $colors      = config('google.colors');
            return new CalendarGateway(
                new GoogleCalendar($calendar_id, $key_file, $scopes, $colors)
            );
        });
    }
}
