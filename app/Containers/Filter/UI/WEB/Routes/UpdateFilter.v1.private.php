<?php

/** @var Route $router */
$router->patch('filters/{id}', [
    'as' => 'web_filter_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
