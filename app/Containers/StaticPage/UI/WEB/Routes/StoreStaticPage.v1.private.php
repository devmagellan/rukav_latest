<?php

/** @var Route $router */
$router->post('staticpages/store', [
    'as' => 'web_staticpage_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
