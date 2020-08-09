<?php

/** @var Route $router */
$router->get('privatecabinets/{id}', [
    'as' => 'web_privatecabinet_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
