<?php

/** @var Route $router */
$router->get('adminpanels', [
    'as' => 'web_adminpanel_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);
