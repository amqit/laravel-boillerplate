<?php

return [

    'characters' => '2346789abcdefghjmnpqrtuxyzABCDEFGHJMNPQRTUXYZ',

    'default'   => [
        'length'    => 5,
        'width'     => 165,
        'height'    => 40,
        'quality'   => 90,
    ],

    'flat'   => [
        'length'    => 6,
        'width'     => 165,
        'height'    => 40,
        'quality'   => 90,
        'lines'     => 6,
        'sensitive' => true,
        'bgImage'   => false,
        'bgColor'   => '#ecf2f4',
        'fontColors'=> ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 3,
        'width'     => 165,
        'height'    => 40,
    ],

    'inverse'   => [
        'length'    => 4,
        'width'     => 110,
        'height'    => 40,
        'quality'   => 90,
        'sensitive' => true,
        'bgImage'   => false,
        'angle'     => 12,
        'sharpen'   => 10,
        'lines'     => 6,
        'fontColors'=> ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
//        'blur'      => 1,
//        'invert'    => true,
        'contrast'  => -5,
    ]

];
