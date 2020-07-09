<?php

/** @var Route $router */
$router->get('staticpages/{id}/edit', [
    'as' => 'web_staticpage_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
