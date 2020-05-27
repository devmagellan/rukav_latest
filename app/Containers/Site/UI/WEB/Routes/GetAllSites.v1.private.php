<?php

/** @var Route $router */
$router->get('sites', [
    'as' => 'web_site_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
