<?php

/** @var Route $router */
$router->delete('sites/{id}', [
    'as' => 'web_site_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
