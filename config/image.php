<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    //index size
    'index-image-sizes' => [
        'large' => [
            'width' => 800,
            'height' => 600
        ],
         'medium' => [
            'width' => 350,
            'height' => 350
        ],
         'small' => [
            'width' => 80,
            'height' => 60
        ],

    ],

    'default-current-index-image' => 'medium',


    //slider size
    'slider-image-size' => [
        'userHome' => [
            'width' => 1920,
            'height' => 720
        ],
         'small' => [
            'width' => 80,
            'height' => 60
        ],

    ],

    'default-current-slider-image' => 'userHome',




 
    'image-not-found' => ''

];
