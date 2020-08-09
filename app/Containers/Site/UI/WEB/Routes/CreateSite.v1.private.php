<?php

/** @var Route $router */
$router->get('sites/create', [
    'as' => 'web_site_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
