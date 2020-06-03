<?php

/** @var Route $router */
$router->get('permissions', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

$router->get('roles_and_permissions', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@index',
    'middleware' => [
        'auth:web',
    ],
]);

$router->post('/admin/staff/data', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postData',
    'middleware' => [
        'auth:web',
    ],
]);

$router->post('/admin/staff_permissions/data', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postPermissionsData',
    'middleware' => [
        'auth:web',
    ],
]);

$router->post('/admin/staff/get_roles', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postData',
    'middleware' => [
        'auth:web',
    ],
]);

$router->post('/admin/staff_permissions/change', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postPermissionsChange',
    'middleware' => [
        'auth:web',
    ],
]);




