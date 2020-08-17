<?php

/** @var Route $router */
$router->get('filters/create', [
    'as' => 'web_filter_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
