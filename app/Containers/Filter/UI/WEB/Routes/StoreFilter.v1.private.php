<?php

/** @var Route $router */
$router->post('filters/store', [
    'as' => 'web_filter_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
