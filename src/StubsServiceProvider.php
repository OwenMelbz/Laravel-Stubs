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
        if ($this->app->runningInConsole()) {
            $this->command(StubsCommand::class);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->loadViewsFrom(__DIR__.'/stubs', 'stubs');
        }
    }

}
