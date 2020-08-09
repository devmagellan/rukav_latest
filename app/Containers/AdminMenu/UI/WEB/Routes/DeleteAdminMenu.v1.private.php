<?php

/** @var Route $router */
$router->delete('adminmenus/{id}', [
    'as' => 'web_adminmenu_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
