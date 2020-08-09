<?php

/** @var Route $router */
$router->get('adminmenus/create', [
    'as' => 'web_adminmenu_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
