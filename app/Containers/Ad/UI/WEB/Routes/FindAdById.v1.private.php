<?php

/** @var Route $router */
$router->get('ads/{id}', [
    'as' => 'web_ad_show',
    'uses'  => 'Controller@show',
    'middleware' => [
      'auth:web',
    ],
]);
