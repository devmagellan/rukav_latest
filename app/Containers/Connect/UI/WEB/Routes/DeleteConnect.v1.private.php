<?php

/** @var Route $router */
$router->delete('connects/{id}', [
    'as' => 'web_connect_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
