<?php

/** @var Route $router */
$router->get('permissions/{id}', [
    'as' => 'web_permissions_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
