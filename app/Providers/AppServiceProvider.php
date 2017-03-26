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
        // \DB::listen(function ($query) {
            // $query->sql
            // $query->bindings
            // $query->time
            // var_dump([
            //     $query->sql,
            //     $query->bindings
            // ]);
        // });
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
    }
}
