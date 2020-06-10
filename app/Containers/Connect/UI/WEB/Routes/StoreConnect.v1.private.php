<?php

/** @var Route $router */
$router->post('connects/store', [
    'as' => 'web_connect_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
