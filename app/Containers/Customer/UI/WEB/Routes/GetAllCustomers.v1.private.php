<?php

/** @var Route $router */
$router->get('customers', [
    'as' => 'web_customer_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
