<?php

/** @var Route $router */
$router->delete('liqpays/{id}', [
    'as' => 'web_liqpay_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
