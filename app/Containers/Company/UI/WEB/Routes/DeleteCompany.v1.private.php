<?php

/** @var Route $router */
$router->delete('companies/{id}', [
    'as' => 'web_company_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
