<?php

/** @var Route $router */
$router->delete('adminpanels/{id}', [
    'as' => 'web_adminpanel_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);
