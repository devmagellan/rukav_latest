<?php

/** @var Route $router */
$router->delete('pages/{id}', [
    'as' => 'web_page_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
