<?php

namespace Newo\Sdk;

use Illuminate\Support\ServiceProvider;

class NewoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/newo.php', 'newo');

        $this->app->singleton('newo', function () {
            return new Newo();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/newo.php' => config_path('newo.php'),
        ], 'newo-config');
    }
}