<?php

$router->get('/dashboard', [
    'as'   => 'get_admin_dashboard_page',
    'uses'       => 'Controller@viewDashboardPage',
    'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:admin'
    ],
]);

$router->get('/admin/login', [
  'as'   => 'get_admin_login',
  'uses'       => 'Controller@getLoginFormToAdminPage',
]);
$router->post('/admin/login', [
  'as'   => 'loging',
  'uses'       => 'Controller@loginAdmin',
]);

