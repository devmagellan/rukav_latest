<?php

/** @var Route $router */
$router->get('staticpages/create', [
    'as' => 'web_staticpage_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
