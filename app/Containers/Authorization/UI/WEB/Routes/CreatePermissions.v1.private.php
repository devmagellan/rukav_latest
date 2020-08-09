<?php

/** @var Route $router */
$router->get('permissions/create', [
    'as' => 'web_permissions_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
