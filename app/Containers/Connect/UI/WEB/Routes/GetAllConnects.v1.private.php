<?php

/** @var Route $router */
$router->get('connects', [
    'as' => 'web_connect_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
