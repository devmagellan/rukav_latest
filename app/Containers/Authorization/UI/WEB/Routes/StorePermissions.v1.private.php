<?php

/** @var Route $router */
$router->post('permissions/store', [
    'as' => 'web_permissions_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
