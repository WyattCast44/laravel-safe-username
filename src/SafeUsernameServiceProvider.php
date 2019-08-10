<?php

namespace Wyattcast44\SafeUsername;

use Illuminate\Support\ServiceProvider;

class SafeUsernameServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/safe-username.php' => config_path('safe-username.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/safe-username.php', 'safe-username');

        // Register the main class to use with the facade
        $this->app->singleton('safe-username', function () {
            return new SafeUsername;
        });
    }
}
