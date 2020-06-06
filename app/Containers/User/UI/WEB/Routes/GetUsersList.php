<?php



$router->get('/users_list', [
    'as'   => 'users_list_dashboard',
    'uses'       => 'Controller@index',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/users/data', [
    'as'   => 'users_list_dashboard',
    'uses'       => 'Controller@postData',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/user/email_check', [
    'as'   => 'users_list_dashboard',
    'uses'       => 'Controller@emailCheck',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);


