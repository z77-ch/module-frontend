<?php
namespace Z77\Module\Frontend\Ui\Config;

return [
    'documentTpl' => [
        'name' => 'html-default-skeleton',
        'nameSpace' => 'Z77\Module\Frontend',
    ],
    'styleSheets' => [
        ['nameSpace' => 'Service'],
        ['nameSpace' => 'Backend'],
        ['nameSpace' => 'Cloud', 'name' => 'common', 'media' => ''],
        ['nameSpace' => 'Cloud', 'name' => 'mobile', 'media' => 'screen and (max-width: 767px) and (max-height: 450px)'],
        ['nameSpace' => 'Cloud', 'name' => 'desktop', 'media' => 'screen and (min-width: 768px) and (min-height: 451px)'],
    ],
    'levelElements' => [
        // level
        'head' => [],
        'body' => [
            // sections
            'header' => [
                // partials
                [
                    'nameSpace' => 'Z77\Module\Frontend',
                    'path' => ''
                ]
            ],
            'main' => [
                // partials
                [
                    'nameSpace' => 'Z77\Module\Frontend',
                    'path' => 'IndexController',
                    'name' => 'indexAction'
                ]
            ],
            'footer' => [
                // partials
            ],
        ],

    ],
];
