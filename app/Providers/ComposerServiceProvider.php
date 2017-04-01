<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\KidsComposer;
use App\Http\ViewComposers\ComboComposer;
use App\Http\ViewComposers\EventsComposer;
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
            'combos.*',
            ComboComposer::class
       );

        View::composer(
            'events.index',
            EventsComposer::class
        );

        View::composer(
            'events.index',
            KidsComposer::class
        );

        View::composer(
            'includes.productmanager',
            ProductManagerComposer::class
        );

        View::composer(
            ['kids.edit', 'kids.create'],
            KidsComposer::class
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
