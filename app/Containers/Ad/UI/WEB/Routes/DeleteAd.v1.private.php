<?php

/** @var Route $router */
$router->delete('ads/{id}', [
    'as' => 'web_ad_delete',
    'uses'  => 'Controller@delete',
    'middleware' => [
      'auth:web',
    ],
]);

$router->post('/ads/delete', [
    'as' => 'post_ad_delete',
    'uses'  => 'Controller@postDelete',
    /* 'middleware' => [
         'auth:web',
     ],*/
]);

