<?php

/** @var Route $router */
$router->get('connects/{id}/edit', [
    'as' => 'web_connect_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
