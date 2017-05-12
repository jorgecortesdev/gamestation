<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\KidsComposer;
use App\Http\ViewComposers\ComboComposer;
use App\Http\ViewComposers\EventsComposer;
use App\Http\ViewComposers\PropertiesComposer;
use App\Http\ViewComposers\ProductTypeComposer;
use App\Http\ViewComposers\ProductManagerComposer;

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
            ['combos.create', 'combos.edit'],
            ComboComposer::class
       );

        View::composer(
            ['events.create', 'events.edit'],
            EventsComposer::class
        );

        // View::composer(
        //     ['events.create', 'events.edit'],
        //     KidsComposer::class
        // );

        View::composer(
            ['kids.edit', 'kids.create'],
            KidsComposer::class
        );

        View::composer(
            ['properties.edit', 'properties.create'],
            PropertiesComposer::class
        );

        View::composer(
            ['product_types.edit', 'product_types.create'],
            ProductTypeComposer::class
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
