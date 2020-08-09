<?php

/** @var Route $router */
$router->patch('adminpanels/{id}', [
    'as' => 'web_adminpanel_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
