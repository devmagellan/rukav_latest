<?php

/** @var Route $router */
$router->delete('permissions/{id}', [
    'as' => 'web_permissions_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
