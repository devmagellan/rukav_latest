<?php

/** @var Route $router */
$router->get('ads/{id}/edit', [
    'as' => 'web_ad_edit',
    'uses'  => 'Controller@edit',
    'middleware' => [
      'auth:web',
    ],
]);

$router->post('/ads/edit', [
    'as' => 'post_ad_edit',
    'uses'  => 'Controller@postEdit',
   /* 'middleware' => [
        'auth:web',
    ],*/
]);


