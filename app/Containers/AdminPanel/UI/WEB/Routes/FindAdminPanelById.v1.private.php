<?php

/** @var Route $router */
$router->get('adminpanels/{id}', [
    'as' => 'web_adminpanel_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
