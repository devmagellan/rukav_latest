<?php

/** @var Route $router */
$router->get('liqpays/{id}', [
    'as' => 'web_liqpay_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
