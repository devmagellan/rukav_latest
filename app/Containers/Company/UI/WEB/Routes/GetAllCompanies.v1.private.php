<?php

/** @var Route $router */
$router->get('companies', [
    'as' => 'web_company_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
