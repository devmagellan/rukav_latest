<?php

/** @var Route $router */
$router->get('pages/{id}/edit', [
    'as' => 'web_page_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
