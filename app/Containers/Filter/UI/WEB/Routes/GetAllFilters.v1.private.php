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

$router->get('filter_deals', [
    'as' => 'web_filter_index',
    'uses'  => 'Controller@indexFilterDeals',
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

$router->post('/admin/filterDeals/data', [
    'as' => 'web_filters_data',
    'uses'  => 'Controller@postDataFilterDeals',
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
$router->post('/filterDeals/delete', [
    'as' => 'filter_delete',
    'uses'  => 'Controller@postDeleteFilterDeals',
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

$router->post('/filterDeals/create', [
    'as' => 'filter_create',
    'uses'  => 'Controller@postSaveFilterDeals',
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
$router->post('/category/filter_deals/get', [
    'as' => 'category_filters_get',
    'uses'  => 'Controller@getFilterDeals',
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


$router->post('/search_for_filters', [
  'as' => 'search_for_filters',
  'uses'  => 'Controller@searchForFilters',
]);

$router->post('/search_for_filter_deals', [
    'as' => 'search_for_filters',
    'uses'  => 'Controller@searchForFilterDeals',
]);


