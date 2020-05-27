<?php

/** @var Route $router */
$router->get('managers/{id}/edit', [
    'as' => 'web_manager_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
