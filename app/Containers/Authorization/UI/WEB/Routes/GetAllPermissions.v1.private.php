<?php

/** @var Route $router */
$router->get('permissions', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:admin',
    ],
]);

$router->get('roles_and_permissions', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@index',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/admin/staff/data', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postData',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/admin/staff_permissions/data', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postPermissionsData',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/admin/staff/get_roles', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postData',
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/admin/staff_permissions/change', [
    'as' => 'web_permissions_index',
    'uses'  => 'Controller@postPermissionsChange',
    'middleware' => [
        'auth:admin',
    ],
]);




