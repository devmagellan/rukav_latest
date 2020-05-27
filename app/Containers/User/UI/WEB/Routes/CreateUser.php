<?php

/** @var Route $router */

$router->post('/users/create', [
    'as'   => 'users_create',
    'uses'       => 'Controller@postSave',
    /*'domain' => 'admin.'. parse_url(\Config::get('app.url'))['host'],
    'middleware' => [
        'auth:web'
    ],*/
]);