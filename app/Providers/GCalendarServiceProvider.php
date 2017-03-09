<?php

namespace App\Providers;

use App\Library\Google\Calendar;
use Illuminate\Support\ServiceProvider;

class GCalendarServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Calendar::class, function($app) {
            $calendar_id = config('google.calendar.id');
            $key_file    = config('google.calendar.key_file');
            $scopes      = config('google.calendar.scopes');
            return new Calendar($calendar_id, $key_file, $scopes);
        });
    }

    public function provides()
    {
        return [Calendar::class];
    }
}
