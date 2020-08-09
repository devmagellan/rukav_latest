<?php

/** @var Route $router */
$router->get('adminmenus/{id}', [
    'as' => 'web_adminmenu_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
