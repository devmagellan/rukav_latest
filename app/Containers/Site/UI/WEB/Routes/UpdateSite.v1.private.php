<?php

/** @var Route $router */
$router->patch('sites/{id}', [
    'as' => 'web_site_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
