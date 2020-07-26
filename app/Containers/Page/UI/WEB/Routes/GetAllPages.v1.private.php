<?php

/** @var Route $router */
$router->get('pages', [
    'as' => 'web_page_index',
    'uses'  => 'Controller@index',
    'middleware' => [
      'auth:web',
    ],
]);

$router->get('adv', [
    'as' => 'web_page_adv',
    'uses'  => 'Controller@adv',
    /*  'middleware' => [
          'auth:web',
      ],*/
]);

$router->get('about_us', [
    'as' => 'web_page_adv',
    'uses'  => 'Controller@about',
    /*  'middleware' => [
          'auth:web',
      ],*/
]);

$router->get('confidencial', [
    'as' => 'web_page_confidencial',
    'uses'  => 'Controller@confidencial',
    /*  'middleware' => [
          'auth:web',
      ],*/
]);

$router->get('career', [
    'as' => 'web_page_career',
    'uses'  => 'Controller@career',
    /*  'middleware' => [
          'auth:web',
      ],*/
]);
