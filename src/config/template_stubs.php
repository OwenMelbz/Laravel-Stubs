<?php

return [

    /**
    * Creates a vanilla js vue2 component
    */
    [
        'name' => 'vue',
        'stub' => 'vue-component.js',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
    * Creates a .vue component
    */
    [
        'name' => '.vue',
        'stub' => 'Component.vue',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
    * Creates a basic jQuery encapsulation
    */
    [
        'name' => 'jquery',
        'stub' => 'jQuery.js',
        'output_path' => resource_path('assets/js/components'),
    ],

    /**
    * Creates a basic blade view
    */
    [
        'name' => 'blade',
        'stub' => 'blade.blade.php',
        'output_path' => resource_path('views'),
    ],


];