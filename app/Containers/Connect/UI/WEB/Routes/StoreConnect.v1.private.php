<?php

/** @var Route $router */
$router->get('connects/store', [
    'as' => 'web_connect_store',
    'uses'  => 'Controller@store',
 /*  'middleware' => [
      'auth:web',
    ],*/
]);
