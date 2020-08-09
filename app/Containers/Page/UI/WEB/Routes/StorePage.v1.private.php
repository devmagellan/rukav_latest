<?php

/** @var Route $router */
$router->post('pages/store', [
    'as' => 'web_page_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
