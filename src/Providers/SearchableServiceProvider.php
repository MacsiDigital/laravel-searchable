<?php

namespace MacsiDigital\Searchable\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use MacsiDigital\Searchable\Searchable;

class SearchableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'searchable');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'searchable');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/config.php' => config_path('searchable.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/searchable'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/searchable'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/searchable'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }

        Blade::directive('searchableformurl', function () {
            return "<?php echo \MacsiDigital\Searchable\SearchableFormUrl::render();?>";
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'searchable');

        // Register the main class to use with the facade
        $this->app->singleton('searchable', function () {
            return new Searchable;
        });
    }
}
