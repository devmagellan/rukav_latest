<?php

/** @var Route $router */
$router->patch('permissions/{id}', [
    'as' => 'web_permissions_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
