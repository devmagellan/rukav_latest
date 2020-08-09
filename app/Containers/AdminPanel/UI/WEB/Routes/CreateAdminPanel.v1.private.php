<?php

/** @var Route $router */
$router->get('adminpanels/create', [
    'as' => 'web_adminpanel_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
