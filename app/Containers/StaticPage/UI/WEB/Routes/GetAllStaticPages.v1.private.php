<?php

/** @var Route $router */
$router->get('staticpages', [
    'as' => 'web_staticpage_index',
    'uses'  => 'Controller@index',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
      'auth:admin',
    ],
]);

$router->post('/admin/staticpages/data', [
    'as' => 'web_staticpage_data',
    'uses'  => 'Controller@postData',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/staticpage/update_status', [
    'as' => 'staticpage_update_status',
    'uses'  => 'Controller@updateStaticPageStatus',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/staticpage/create', [
    'as' => 'staticpage_create',
    'uses'  => 'Controller@postSave',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);



