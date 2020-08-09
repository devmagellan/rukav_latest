<?php

/** @var Route $router */
$router->post('sites/store', [
    'as' => 'web_site_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
