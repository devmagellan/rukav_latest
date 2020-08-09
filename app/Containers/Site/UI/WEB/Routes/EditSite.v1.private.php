<?php

/** @var Route $router */
$router->get('sites/{id}/edit', [
    'as' => 'web_site_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
