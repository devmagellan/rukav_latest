<?php

$router->post('/admin/login', [
    'as'   => 'post_admin_login_form',
    'uses' => 'Controller@loginAdmin',
    //'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
]);

$router->post('/admin/login_opt', [
    'as'   => 'post_opt_login_form',
    'uses' => 'Controller@loginOpt',
    //'domain' => 'opt.'. parse_url(\Config::get('app.url'))['host'],
]);
