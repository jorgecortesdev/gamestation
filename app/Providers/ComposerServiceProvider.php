<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\ComboComposer;
use App\Http\ViewComposers\EventsComposer;

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