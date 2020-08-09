<?php

/** @var Route $router */
$router->get('managers', [
    'as' => 'web_manager_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
