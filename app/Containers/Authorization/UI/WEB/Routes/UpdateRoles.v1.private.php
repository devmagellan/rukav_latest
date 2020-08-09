<?php

/** @var Route $router */
$router->post('roles/updateRole', [
    'as' => 'web_roless_create',
    'uses'  => 'Controller@updateRole',
    'middleware' => [
      'auth:web',
    ],
]);
