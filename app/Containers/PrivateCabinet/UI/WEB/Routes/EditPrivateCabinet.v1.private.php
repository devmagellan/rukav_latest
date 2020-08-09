<?php

/** @var Route $router */
$router->get('privatecabinets/{id}/edit', [
    'as' => 'web_privatecabinet_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
