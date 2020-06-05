<?php

/** @var Route $router */
$router->get('companies/create', [
    'as' => 'web_company_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
