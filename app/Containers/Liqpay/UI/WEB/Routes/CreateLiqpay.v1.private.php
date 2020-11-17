<?php

/** @var Route $router */
$router->get('/liqpays/create', [
    'as' => 'web_liqpay_create',
    'uses'  => 'Controller@create',
 /*   'middleware' => [
      'auth:web',
    ],*/
]);
