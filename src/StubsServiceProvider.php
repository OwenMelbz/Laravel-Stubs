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

        $this->loadViewsFrom(__DIR__.'/stubs', 'stubs');

        $this->mergeConfigFrom(
            __DIR__.'/config/template_stubs.php', 'template_stubs'
        );
    }

}
