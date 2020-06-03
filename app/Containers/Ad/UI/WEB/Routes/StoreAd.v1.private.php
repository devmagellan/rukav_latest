<?php

/** @var Route $router */
$router->post('ads/store', [
    'as' => 'web_ad_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);

$router->get('ads/success-created', [
  'as' => 'web_ad_success',
  'uses'  => 'Controller@showSuccessPage',
  'middleware' => [
    'auth:web',
  ],
]);
