<?php
namespace Z77\Module\Frontend\Ui\Config;

return [
    'documentTpl' => [
        'name' => 'html-default-skeleton',
        'nameSpace' => 'Z77\\Module\\Frontend',
    ],
    'styleSheets' => [
        //['nameSpace' => 'Z77\\Module\\Service'],
        //['nameSpace' => 'Z77\\Module\\Backend'],
        ['nameSpace' => 'Z77\\Module\\Frontend', 'name' => 'common', 'media' => ''],
        ['nameSpace' => 'Z77\\Module\\Frontend', 'name' => 'mobile', 'media' => 'screen and (max-width: 767px) and (max-height: 450px)'],
        ['nameSpace' => 'Z77\\Module\\Frontend', 'name' => 'desktop', 'media' => 'screen and (min-width: 768px) and (min-height: 451px)'],
    ],
    'levelElements' => [
        // level
        'head' => [
            'meta' => [
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials/head',
                    'name' => 'meta'
                ]
            ],
            'seo' => [
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials/head',
                    'name' => 'seo'
                ]
            ],
            'favicon' => [
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials/head',
                    'name' => 'favicon'
                ]
            ],
            'styles' => [                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials/head',
                    'name' => 'styles'
                ]   ],
            'scripts' => [
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials/head',
                    'name' => 'scripts'
                ]
            ],
            'social' => [
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials/head',
                    'name' => 'social'
                ]
            ]
        ],
        'body' => [
            // sections
            'header' => [
                // partials
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials',
                    'name' => 'header'
                ]
            ],
            'main' => [
                // partials
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'IndexController',
                    'name' => 'indexAction'
                ]
            ],
            'footer' => [
                // partials
                [
                    'nameSpace' => 'Z77\\Module\\Frontend',
                    'path' => 'partials',
                    'name' => 'footer'
                ]
            ],
        ],

    ],
];
