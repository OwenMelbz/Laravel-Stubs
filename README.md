# Laravel Stub Helper

We often find outselves having to repeat the same boilerplating when creating new files such as javascript components, blade templates etc.

This package aims to help save your brain cells for the more important things in life (like pizza) by enabling you scaffold the things you're always repeating within a project by taking influence from the other `make:` commands.


## Installation

1- Install via composer `composer require owenmelbz/laravel-stubs`.

2- The package should use laravels new auto discovery, if not however you can manually register the service provider - typically done inside the `app.php` providers array e.g `OwenMelbz\LaravelStubs\StubsServiceProvider::class`.

3- If you're going to be modifying the default stubs, or adding your own stubs, you'll need to publish the config using `php artisan vendor:publish --tag=stubs-config` which will generate `config/template_stubs.php`

## Usage

Run `php artisan make:a {stub} {name}` this will generate you a new file, based off the defined stub 

The `{name}` will become the filename and typically the class/component name where the default `@placeholder` marker is used within the files.

## Default stubs

You can view a full list of the default stubs from the config file -> https://github.com/OwenMelbz/Laravel-Stubs/blob/master/src/config/template_stubs.php

## Modifying existing stubs

If you want to modify a default stub you can do this in 2 different ways.

The stubs are loaded in a waterfall style - so if you have your own file inside your `resources/stubs` folder we will use this file instead.

You can either use the same filename that is defined within the `stub` key of the config e.g `vue-component.js` and we'll use that. Or you can create a file of any name and change the `stub` key in a published config file.

## Adding custom stubs

You can either publish the default config and modify it, or create your own called `template_stubs.php` - if you wanted you could even use `php artisan make:a config template_stubs` and start adding your own.

Creating a new stub requires at minimum, a stub file, an output path, and a name. Below is an example structure

```php
'my-stub' => [
    'stub' => 'my-stub.php',
    'output_path' => resource_path('some-folder')
]
```

It's worth noting that the file extension of the outputted file will match that of the stub file. So in this instance we do not recommend using `.stub` as your file extension.

During the generation process we parse a token called `@placeholder` anywhere this marker is within your stub, will get replaced by the name you passed into the command. e.g

This command `artisan make:a vue my-component` will see a file

```js
Vue.component('@placeholder', {

});
```

and generate `my-component.js` with the content

```js
Vue.component('my-component', {

});
```

If you want to change `@placeholder` to something else add the `placeholder => '@myothername'` to the stub definition within the config.

## Contributing community stubs

Please feel free to submit pull requests to add custom stubs, make sure there are no naming conflicts, and keep them as simple as possible.

Typically we adhear to a PSR-2 style for php files, I may modify the code style to make it consistent with submitted stubs.

## Notes

This is a very new package, has not been heavily used in the wild, so please bare with me if you stumble across bugs, always add a PR where possible to fix issues as its massively appreciated.

Thank :D