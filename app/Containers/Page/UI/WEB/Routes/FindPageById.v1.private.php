<?php

/** @var Route $router */
$router->get('pages/{id}', [
    'as' => 'web_page_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
