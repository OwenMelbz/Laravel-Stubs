# Laravel Stub Helper

We often find outselves having to repeat the same boilerplating when creating new files such as javascript components, blade templates etc.

This package aims to help save your brain cells for the more important things in life (like pizza) by enabling you scaffold the things you're always repeating within a project by taking influence from the other `make:` commands.


## Usage

1- Install via composer `composer require owenmelbz/laravel-stubs`.

2- The package should use laravels new auto discovery, if not however you can manually register the service provider - typically done inside the `app.php` providers array e.g `OwenMelbz\LaravelStubs\StubsServiceProvider::class`.

3- Run `php artisan preset uikit3` this will generate the js and scss needed.

4- *Optional* If you need `make:auth` to use uikit, run `php artisan preset uikit3-auth` to generate the templates.

5- *Optional* You can then run something like the vuejs or react presets as well.

## Warning

This replaces the default laravel auth scaffolding, so if you want to revert to bootstrap, you'll need to run `artisan make:auth` again to overwrite it.

## Why?

Bootstrap has outlived its welcome creating generic designs and is lacking in many features required for modern web builds, UIKit 3 has a great eco-system and feature rich making it a perfect modular framework, allowing you to require just what you need.
