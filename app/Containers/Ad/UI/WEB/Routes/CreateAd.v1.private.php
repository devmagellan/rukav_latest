<?php

/** @var Route $router */
$router->get('ads/create', [
    'as' => 'web_ad_create',
    'uses'  => 'Controller@create',
    'middleware' => [
      'auth:web',
    ],
]);
