<?php

/** @var Route $router */
$router->delete('staticpages/{id}', [
    'as' => 'web_staticpage_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
