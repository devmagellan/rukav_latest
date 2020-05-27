<?php

/** @var Route $router */
$router->get('sites/{id}', [
    'as' => 'web_site_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
