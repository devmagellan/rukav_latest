<?php

/** @var Route $router */
$router->get('permissions/{id}/edit', [
    'as' => 'web_permissions_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
