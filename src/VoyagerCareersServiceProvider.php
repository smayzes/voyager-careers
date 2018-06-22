<?php

namespace Codelabs\VoyagerCareers;

use Illuminate\Support\ServiceProvider;

class VoyagerCareersServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'voyagercareers');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/config/voyagercareers.php' => config_path('voyagercareers.php'),
            ], 'voyagercareers.config');
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/voyagercareers.php', 'voyagercareers');

        // Register the service the package provides.
        $this->app->singleton('voyagercareers', function ($app) {
            return new VoyagerCareers;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['voyagercareers'];
    }
}
