<?php
namespace Z77\Module\Frontend\App;

use Z77\Core\Config\AuthRole;

return [
    'defaultController' => 'index',
    'defaultAction' => 'index',
    'moduleRole' => AuthRole::SUPER_USER,
    'auth2Fa' => false,
    'controllers' => [
        'TesteDenController' => [
            'controllerRole' => AuthRole::MEMBER,
            'actions' => [ '*' => AuthRole::GUEST, ],
        ],
        '*' => [
            'controllerRole' => AuthRole::MEMBER,
            'actions' => [
                'xindexAction' => AuthRole::VISITOR,
                '*' => AuthRole::GUEST,
            ],
        ],
    ]
];
