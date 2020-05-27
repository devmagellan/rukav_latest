<?php

/** @var Route $router */
$router->delete('managers/{id}', [
    'as' => 'web_manager_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
