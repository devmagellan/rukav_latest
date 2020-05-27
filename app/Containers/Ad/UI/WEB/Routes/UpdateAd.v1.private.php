<?php

/** @var Route $router */
$router->patch('ads/{id}', [
    'as' => 'web_ad_update',
    'uses'  => 'Controller@update',
    'middleware' => [
      'auth:web',
    ],
]);
