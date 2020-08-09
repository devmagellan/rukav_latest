<?php

/** @var Route $router */
$router->patch('connects/{id}', [
    'as' => 'web_connect_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
