<?php

/** @var Route $router */
$router->patch('adminmenus/{id}', [
    'as' => 'web_adminmenu_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
