<?php

/** @var Route $router */
$router->patch('privatecabinets/{id}', [
    'as' => 'web_privatecabinet_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
