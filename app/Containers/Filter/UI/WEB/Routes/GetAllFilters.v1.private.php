<?php

/** @var Route $router */
$router->get('filters', [
    'as' => 'web_filter_index',
    'uses'  => 'Controller@index',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
      'auth:admin',
    ],
]);

$router->post('/admin/filters/data', [
  'as' => 'web_filters_data',
  'uses'  => 'Controller@postData',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);

$router->post('/filter/update_status', [
  'as' => 'filter_update_status',
  'uses'  => 'Controller@updateFilterStatus',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);

$router->post('/filter/delete', [
  'as' => 'filter_delete',
  'uses'  => 'Controller@postDelete',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);

$router->post('/filter/create', [
  'as' => 'filter_create',
  'uses'  => 'Controller@postSave',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);

$router->post('/category/filters/get', [
  'as' => 'category_filters_get',
  'uses'  => 'Controller@getFilters',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);

$router->post('/filters/add', [
  'as' => 'filter_add',
  'uses'  => 'Controller@filtersAdd',
  'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
  'middleware' => [
    'auth:admin',
  ],
]);


