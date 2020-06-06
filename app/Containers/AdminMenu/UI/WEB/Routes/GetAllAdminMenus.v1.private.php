<?php

/** @var Route $router */
$router->get('adminmenus', [
    'as' => 'web_adminmenu_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:admin',
    ],
]);
