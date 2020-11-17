<?php

/** @var Route $router */
$router->patch('liqpays/{id}', [
    'as' => 'web_liqpay_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
