<?php

/** @var Route $router */
$router->get('connects/{id}', [
    'as' => 'web_connect_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
