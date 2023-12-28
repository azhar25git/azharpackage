<?php

namespace Azhar25git\AzharPackage;

use Illuminate\Support\ServiceProvider;

class AzharPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'azhar-package');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'azhar-package');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('azhar-package.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/resources/views' => resource_path('views/vendor/azhar-package'),
            ], 'views');

            // Publishing assets.
            $this->publishes([
                __DIR__.'/resources/assets' => public_path('vendor/azhar-package'),
            ], 'assets');

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/resources/lang' => resource_path('lang/vendor/azhar-package'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'azhar-package');

        // Register the main class to use with the facade
        $this->app->singleton('azhar-package', function () {
            return new AzharPackage;
        });
    }
}
