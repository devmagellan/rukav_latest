<?php

/** @var Route $router */
$router->get('adminpanels/{id}/edit', [
    'as' => 'web_adminpanel_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);
