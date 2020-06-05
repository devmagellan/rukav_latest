<?php

/** @var Route $router */
$router->get('companies/{id}/edit', [
    'as' => 'web_company_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
