<?php

namespace OwenMelbz\LaravelStubs;

use Illuminate\Support\ServiceProvider;

class StubsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return false;
        }

        $this->commands([StubsCommand::class]);

        $this->publishes([
            __DIR__.'/config/template_stubs.php' => config_path('template_stubs.php'),
        ], 'stubs-config');

        $this->publishes([
            __DIR__.'/stubs' => resource_path('stubs'),
        ], 'stubs-stubs');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!$this->app->runningInConsole()) {
            return false;
        }

        $this->mergeConfigFrom(
            __DIR__.'/config/template_stubs.php', 'template_stubs'
        );
    }

}
