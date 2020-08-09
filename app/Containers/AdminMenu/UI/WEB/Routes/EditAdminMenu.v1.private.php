<?php

/** @var Route $router */
$router->get('adminmenus/{id}/edit', [
    'as' => 'web_adminmenu_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
