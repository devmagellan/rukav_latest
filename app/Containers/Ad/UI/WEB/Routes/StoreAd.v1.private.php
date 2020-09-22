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

$router->post('/admin/ads/store', [
    'as' => 'admin_ad_store',
    'uses'  => 'Controller@store',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
     'middleware' => [
       'auth:admin',
     ],
]);
