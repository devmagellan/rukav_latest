<?php

/** @var Route $router */
$router->get('connects/create', [
    'as' => 'web_connect_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
