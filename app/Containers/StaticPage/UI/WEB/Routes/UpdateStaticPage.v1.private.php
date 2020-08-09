<?php

/** @var Route $router */
$router->patch('staticpages/{id}', [
    'as' => 'web_staticpage_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
