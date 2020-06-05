<?php

/** @var Route $router */
$router->patch('companies/{id}', [
    'as' => 'web_company_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
