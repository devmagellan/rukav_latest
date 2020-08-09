<?php

/** @var Route $router */
$router->post('adminmenus/store', [
    'as' => 'web_adminmenu_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
