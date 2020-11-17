<?php

/** @var Route $router */
$router->get('liqpays/{id}/edit', [
    'as' => 'web_liqpay_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
