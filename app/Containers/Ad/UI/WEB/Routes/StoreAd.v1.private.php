<?php

/** @var Route $router */
$router->post('/ads/store', [
    'as' => 'web_ad_store',
    'uses'  => 'Controller@store',
   /* 'middleware' => [
      'auth:web',
    ],*/
]);

$router->post('ads/search-rubrics', [
  'as' => 'search-rubrics',
  'uses'  => 'Controller@searchRubrics',
]);
