<?php

/** @var Route $router */
$router->get('filters/{id}', [
    'as' => 'web_filter_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
