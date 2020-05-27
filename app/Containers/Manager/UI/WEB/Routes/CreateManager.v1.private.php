<?php

/** @var Route $router */
$router->get('managers/create', [
    'as' => 'web_manager_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
