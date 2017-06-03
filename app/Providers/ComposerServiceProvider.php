<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['pages.events.create', 'pages.events.edit'],
            \App\Http\ViewComposers\EventsComposer::class
        );

        View::composer(
            ['pages.combos.create', 'pages.combos.edit'],
            \App\Http\ViewComposers\CombosComposer::class
       );

        View::composer(
            ['pages.properties.edit', 'pages.properties.create'],
            \App\Http\ViewComposers\PropertiesComposer::class
        );

        View::composer(
            ['pages.products.types.edit', 'pages.products.types.create'],
            \App\Http\ViewComposers\ProductTypesComposer::class
        );

        View::composer(
            ['pages.kids.edit', 'pages.kids.create'],
            \App\Http\ViewComposers\KidsComposer::class
        );

        View::composer(
            ['pages.products.create', 'pages.products.edit'],
            \App\Http\ViewComposers\ProductsComposer::class
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
