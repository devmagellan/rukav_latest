<?php

/** @var Route $router */
$router->post('managers/store', [
    'as' => 'web_manager_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
