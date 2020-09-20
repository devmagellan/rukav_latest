<?php



$router->get('/users_list/{deleted?}', [
    'as'   => 'users_list_dashboard',
    'uses'       => 'Controller@index',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/user/get', [
    'as'   => 'user_data',
    'uses'       => 'Controller@getUserData',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/user/roles_get', [
    'as'   => 'user_roles_get',
    'uses'       => 'Controller@getUserRolesData',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/user/recovery', [
    'as'   => 'user_recovery',
    'uses'       => 'Controller@userRecovery',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/user/change_role', [
    'as'   => 'user_change_role',
    'uses'       => 'Controller@userСhangeRole',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->post('/users/change_password', [
    'as'   => 'user_change_password',
    'uses'       => 'Controller@userСhangePassword',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);



$router->get('/admins_list/{deleted?}', [
  'as'   => 'admins_list_dashboard',
  'uses'       => 'Controller@indexAdmin',
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

$router->post('/admins/data', [
  'as'   => 'users_list_dashboard',
  'uses'       => 'Controller@postAdminsData',
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


