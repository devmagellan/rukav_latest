<?php

/** @var Route $router */
$router->post('adminpanels/store', [
    'as' => 'web_adminpanel_store',
    'uses'  => 'Controller@store',
    'middleware' => [
      'auth:web',
    ],
]);
