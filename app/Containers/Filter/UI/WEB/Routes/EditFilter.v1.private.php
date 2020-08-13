<?php

/** @var Route $router */
$router->get('filters/{id}/edit', [
    'as' => 'web_filter_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
