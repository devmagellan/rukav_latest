<?php

/** @var Route $router */
$router->get('ads/create', [
    'as' => 'web_ad_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);


$router->get('/admin/user_add/adv/{user_id}', [
  'as' => 'admin_ad_create',
  'uses'  => 'Controller@adminCreate',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);
