<?php

/** @var Route $router */
$router->get('managers/{id}', [
    'as' => 'web_manager_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
