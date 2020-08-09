<?php

/** @var Route $router */
$router->patch('pages/{id}', [
    'as' => 'web_page_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
