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

$router->get('/static/{name}', [
    'as' => 'static_page_get',
    'uses'  => 'Controller@getPage',
]);

$router->post('/staticpages_groups/groups/get', [
    'as' => 'staticpage_get',
    'uses'  => 'Controller@getGroups',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);
$router->post('/staticpages_groups/sidebar/get', [
    'as' => 'staticpage_get_sidebar',
    'uses'  => 'Controller@getSidebar',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);
$router->post('/staticpages_groups/groups/update', [
    'as' => 'staticpage_group_update',
    'uses'  => 'Controller@updateGroup',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);



$router->post('/staticpages_types/update', [
    'as' => 'staticpage_types_update',
    'uses'  => 'Controller@updateType',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);
$router->post('/staticpage_groups/update', [
    'as' => 'staticpage_groups',
    'uses'  => 'Controller@postGroupsSave',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/staticpage_sidebar/update', [
    'as' => 'staticpage_sidebar',
    'uses'  => 'Controller@postSidebarSave',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);



$router->post('/staticpages/delete', [
    'as' => 'staticpage_delete',
    'uses'  => 'Controller@postDelete',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin',
    ],
]);

$router->post('/staticpages_position', [
    'as'   => 'staticpages_position',
    'uses'       => 'Controller@setPosition',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);




