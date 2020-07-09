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
