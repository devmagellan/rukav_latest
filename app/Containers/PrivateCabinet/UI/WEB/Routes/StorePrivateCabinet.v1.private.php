<?php

/** @var Route $router */
$router->post('privatecabinets/store', [
    'as' => 'web_privatecabinet_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
