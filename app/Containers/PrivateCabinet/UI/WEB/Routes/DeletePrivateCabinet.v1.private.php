<?php

/** @var Route $router */
$router->delete('privatecabinets/{id}', [
    'as' => 'web_privatecabinet_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
