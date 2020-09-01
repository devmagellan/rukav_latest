<?php

/** @var Route $router */
$router->get('sites', [
    'as' => 'web_site_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

$router->get('/make_categories', [
    'as' => 'make_categories',
    'uses'  => 'Controller@makeCategories',

]);
