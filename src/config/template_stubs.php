<?php

return [

    /**
     * Creates a vanilla js vue2 component
     */
    'vue' => [
        'stub' => 'vue-component.js',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
     * Creates a basic react component
     */
    'react' => [
        'stub' => 'react-component.js',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
     * Creates a .vue component
     */
    '.vue' => [
        'stub' => 'Component.vue',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
     * Creates a basic jQuery encapsulation
     */
    'jquery' => [
        'stub' => 'jQuery.js',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
     * Creates a basic es6 module
     */
    'es6-module' => [
        'stub' => 'es6-module.js',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
     * Creates a basic blade view
     */
    'blade' => [
        'stub' => 'blade.blade.php',
        'output_path' => resource_path('views'),
    ],

    /**
     * Creates a basic config file
     */
    'config' => [
        'stub' => 'config.php',
        'output_path' => config_path(),
    ],

    /**
     * Creates a basic test file
     */
    'basic-test' => [
        'stub' => 'basic-test.php',
        'output_path' => base_path('tests'),
    ],
];
