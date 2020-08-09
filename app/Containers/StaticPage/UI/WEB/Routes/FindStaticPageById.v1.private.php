<?php

/** @var Route $router */
$router->get('staticpages/{id}', [
    'as' => 'web_staticpage_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);


$router->get('help/{id}', [
    'as' => 'web_staticpage_help',
    'uses'  => 'Controller@showHelp',
]);
