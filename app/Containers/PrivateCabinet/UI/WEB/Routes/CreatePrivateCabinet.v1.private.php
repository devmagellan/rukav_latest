<?php

/** @var Route $router */
$router->get('privatecabinets/create', [
    'as' => 'web_privatecabinet_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
