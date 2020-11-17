<?php

/** @var Route $router */
$router->post('liqpays/store', [
    'as' => 'web_liqpay_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
