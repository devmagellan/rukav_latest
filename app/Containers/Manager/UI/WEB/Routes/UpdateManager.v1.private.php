<?php

/** @var Route $router */
$router->patch('managers/{id}', [
    'as' => 'web_manager_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
