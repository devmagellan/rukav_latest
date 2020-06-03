<?php

/** @var Route $router */
$router->post('roles/createRole', [
    'as' => 'web_roless_create',
    'uses'  => 'Controller@createRole',
    'middleware' => [
      'auth:web',
    ],
]);
