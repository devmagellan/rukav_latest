<?php

/** @var Route $router */
$router->get('pages/create', [
    'as' => 'web_page_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
