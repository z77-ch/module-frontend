<?php
namespace Z77\App\Frontend\Config;

use Z77\Core\Config\AuthRole;


return [
    // first Key is our default Module
    'setup' => [
        'mainController' => 'setup',
        'mainAction' => 'selection',
        'moduleRole' => AuthRole::SUPER_USER,
        'loginModule' => 'auth',
        'auth2Fa' => true,
        'controllers' => [
            'SetupController' => [
                'controllerRole' => AuthRole::SUPER_USER,
                'actions' => ['*' => AuthRole::SUPER_USER,],
            ],
        ],

    ],
    'common' => [
        'mainController' => 'user',
        'mainAction' => 'list',
        'moduleRole' => AuthRole::SUPER_USER,
        'loginModule' => 'auth',
        'auth2Fa' => true,
        'controllers' => [
            'SetupController' => [
                'controllerRole' => AuthRole::SUPER_USER,
                'actions' => ['*' => AuthRole::SUPER_USER,],
            ],
        ],

    ],
    'auth' => [
        'mainController' => 'login',
        'mainAction' => 'login',
        'moduleRole' => AuthRole::GUEST,
        'auth2Fa' => true,
        'controllers' => [
            'LoginController' => [
                'controllerRole' => AuthRole::GUEST,
                'actions' => [
                    '*' => AuthRole::SUPER_USER,
                    'login' => AuthRole::GUEST,
                 ],
            ],
        ],
    ],
    'frontend' => [
        'defaultController' => 'index',
        'defaultAction' => 'index',
        'moduleRole' => AuthRole::GUEST,
        'auth2Fa' => false,
        'controllers' => [
            'TesteDenController' => [
                'controllerRole' => AuthRole::GUEST,
                'actions' => [ '*' => AuthRole::GUEST, ],
            ],
            '*' => [
                'controllerRole' => AuthRole::GUEST,
                'actions' => [ '*' => AuthRole::GUEST, ],
            ],
        ],
        'htmlDocument' => [
            'name' = 'layout',
            'partials' => ['head', 'header', 'body', 'footer'],
            'css' => [
                ['moduleKey' => 'service'],
                ['moduleKey' => 'backend'],
                ['moduleKey' => 'cloud', 'name' => 'common', 'media' => ''],
                ['moduleKey' => 'cloud', 'name' => 'mobile', 'media' => 'screen and (max-width: 767px) and (max-height: 450px)'],
                ['moduleKey' => 'cloud', 'name' => 'desktop', 'media' => 'screen and (min-width: 768px) and (min-height: 451px)'],
            ],
            'js' => [
                ['moduleKey' => 'service', 'name' => 'init'],
            ]
        ],
    ],
];
