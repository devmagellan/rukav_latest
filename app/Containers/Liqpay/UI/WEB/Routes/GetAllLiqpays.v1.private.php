<?php

/** @var Route $router */
$router->get('liqpays', [
    'as' => 'web_liqpay_index',
    'uses'  => 'Controller@index',
  /*  'middleware' => [
      'auth:web',
    ],*/
]);
