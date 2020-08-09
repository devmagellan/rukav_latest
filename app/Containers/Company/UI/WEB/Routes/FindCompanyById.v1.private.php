<?php

/** @var Route $router */
$router->get('companies/{id}', [
    'as' => 'web_company_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
