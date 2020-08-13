<?php

/** @var Route $router */
$router->delete('filters/{id}', [
    'as' => 'web_filter_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
